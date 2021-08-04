<?php
/**
 * Route Doc Comment
 * 
 * PHP version 7
 * 
 * @category Routing
 * @package  Src/Routing
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
namespace App\Routing;

/**
 * Route Doc Comment
 * 
 * A Route describes a route and its parameters.
 * 
 * @category Routing
 * @package  Src/Routing
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
class Route
{

    /**
     * Path of Route
     * 
     * @var string
     */
    private $_path;

    /**
     * Callable of Route
     * 
     * @var string
     */
    private $_callable;

    /**
     * Middleware of Route
     * 
     * @var string
     */
    private $_middleware = null;

    /**
     * Method of Route
     * 
     * @var string
     */
    private $_method;

    /**
     * Matches of Route
     * 
     * @var array
     */
    private $_matches = [];

    /**
     * Requirements of Route
     * 
     * @var array
     */
    private $_requirements = [];

    /**
     * Constructor class.
     * 
     * @param string $path         The path pattern to match.
     * @param array  $callable     A action to call.
     * @param string $method       Method
     * @param array  $requirements Requirements
     */
    public function __construct(string $path, array $callable, string $method, array $requirements = [])
    {
        $this->setPath($path);
        $this->_callable = $callable['controller'];
        if (isset($callable['middleware'])) {
            $this->_middleware = $callable['middleware'];
        }
        $this->_method = $method;
        $this->addRequirements($requirements);
    }

    /**
     * Sets the pattern for the path.
     *
     * @param string $pattern pattern
     * 
     * @return $this Returns the path.
     */
    public function setPath(string $pattern): self
    {
        $this->_path = trim($pattern, '/');
        return $this;
    }

    /**
     * Returns the name of the route.
     *
     * @return string Returns the name route.
     */
    public function getMethod(): string
    {
        return $this->_method;
    }

    /**
     * Adds requirements.
     * 
     * @param array $requirements requirement
     * 
     * @return $this Returns the requirement for the given key.
     */
    public function addRequirements(array $requirements): self
    {
        foreach ($requirements as $key => $regex) {
            $this->_requirements[$key] = str_replace('(', '(?:', $regex);
        }
        return $this;
    }

    /**
     * Match the URL associated with this routes.
     * 
     * @param mixed $url The resource upon which to apply the request.
     * 
     * @return bool Returns true if the resource matching, false otherwise.
     */
    public function match($url): bool
    {
        $path = preg_replace_callback(
            '#:(\w+)#',
            function ($m) {
                return '(' . ($this->_requirements[$m[1]] ?? '[^/]+') . ')';
            },
            $this->_path
        );
        if (!preg_match("#^" . $path . "$#", trim($url, '/'), $matches)) {
            return false;
        }
        array_shift($matches);
        $this->_matches = $matches;
        return true;
    }


    /**
     * Compiles the current route instance.
     * 
     * @return [type]
     */
    public function compile()
    {
        if ($this->_middleware != null) {
            $middleware = $this->_middleware;
            new $middleware;
        }
        [$controller, $method] = explode('@', $this->_callable, 2);
        return call_user_func_array([new $controller(), $method], $this->_matches);
    }
}

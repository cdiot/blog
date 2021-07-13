<?php

namespace App\Routing;

/**
 * A Route describes a route and its parameters.
 */
class Route
{

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $callable;

    /**
     * @var string
     */
    private $method;

    /**
     * @var array
     */
    private $matches = [];

    /**
     * @var array
     */
    private $requirements = [];

    /**
     * Route Constructor.
     * 
     * @param string $path The path pattern to match.
     * @param string $callable A action to call.
     */
    public function __construct(string $path, string $callable, string $method, array $requirements = [])
    {
        $this->setPath($path);
        $this->callable = $callable;
        $this->method = $method;
        $this->addRequirements($requirements);
    }

    /**
     * Sets the pattern for the path.
     *
     * @return $this Returns the path.
     */
    public function setPath(string $pattern): self
    {
        $this->path = trim($pattern, '/');
        return $this;
    }

    /**
     * Returns the name of the route.
     *
     * @return string Returns the name route.
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * Adds requirements.
     * 
     * @param string $key The given key.
     * @param string $regex The regex.
     * @return $this Returns the requirement for the given key.
     */
    public function addRequirements(array $requirements): self
    {
        foreach ($requirements as $key => $regex) {
            $this->requirements[$key] = str_replace('(', '(?:', $regex);
        }
        return $this;
    }

    /**
     * Match the URL associated with this routes.
     * 
     * @param string $url The resource upon which to apply the request.
     * @return bool Returns true if the resource matching, false otherwise.
     */
    public function match(string $url): bool
    {
        $path = preg_replace_callback(
            '#:(\w+)#',
            function ($m) {
                return '(' . ($this->requirements[$m[1]] ?? '[^/]+') . ')';
            },
            $this->path
        );
        if (!preg_match("#^" . $path . "$#", trim($url, '/'), $matches)) {
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;
        return true;
    }


    /**
     * Compiles the current route instance.
     */
    public function compile()
    {
        [$controller, $method] = explode('@', $this->callable, 2);
        return call_user_func_array([new $controller(), $method], $this->matches);
    }
}

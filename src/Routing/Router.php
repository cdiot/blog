<?php
/**
 * Router Doc Comment
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

use App\Http\Request;
use App\Routing\Route;
use App\Routing\Exception\RouteNotFoundException;

/**
 * Router Doc Comment
 * 
 * The Router class integrates all the elements of the routing system. 
 * 
 * @category Routing
 * @package  Src/Routing
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
class Router
{
    /**
     * Request
     * 
     * @var Request
     */
    protected $request;

    /**
     * Url 
     * 
     * @var string
     */
    private $_url;

    /**
     * Routes
     * 
     * @var Route[]
     */
    private $_routes = [];

    /**
     * Constructor class
     * 
     * @param string $url url
     */
    public function __construct(string $url)
    {
        $this->request = new Request;
        $this->_url = $url;
    }

    /**
     * Adds a Route. 
     * 
     * @param Route $route Route instance.
     * 
     * @return $this Returns a route instance.
     */
    public function add(Route $route): self
    {
        $this->_routes[$route->getMethod()][] = $route;
        return $this;
    }

    /**
     * Gets the CompiledRoute instance associated with this Router.
     * 
     * @return array|Route[] Returns a route instance.
     * @throws RouteNotFoundException If the requested page cannot be found.
     */
    public function getCompiledRoutes(): Route
    {
        if (!isset($this->_routes[$this->request->getServer('REQUEST_METHOD')])) {
            throw new RouteNotFoundException('REQUEST_METHOD does not exist');
        }
        foreach ($this->_routes[$this->request->getServer('REQUEST_METHOD')] as $route) {
            if ($route->match($this->_url)) {
                $route->compile();
                return $route;
            }
        }
        throw new RouteNotFoundException('No matching routes');
    }
}

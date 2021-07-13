<?php

namespace App\Routing;

use App\Routing\Route;
use App\Routing\Exception\RouteNotFoundException;

/**
 * The Router class integrates all the elements of the routing system. 
 */
class Router
{

    /**
     * @var string
     */
    private $url;

    /**
     * @var Route[]
     */
    private $routes = [];

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * Adds a Route. 
     * 
     * @param  Route $route Route instance.
     * @return $this Returns a route instance.
     */
    public function add(Route $route): self
    {
        $this->routes[$route->getMethod()][] = $route;
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
        if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
            throw new RouteNotFoundException('REQUEST_METHOD does not exist');
        }
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->match($this->url)) {
                $route->compile();
                return $route;
            }
        }
        throw new RouteNotFoundException('No matching routes');
    }
}

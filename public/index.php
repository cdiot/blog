<?php 
require "../vendor/autoload.php";

use App\Routing\Exception\RouteNotFoundException;
use App\Routing\Router;
use App\Routing\Route;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

$router = new Router($_GET['url']);

$router->add(new Route('/', 'App\Controller\BlogController@index', 'GET'));
$router->add(new Route('/posts/:id', 'App\Controller\BlogController@show', 'GET', ['id', '[0-9]+']));

try {
    $router->getCompiledRoutes();
} catch (RouteNotFoundException $e) {
    echo $e->error404();
}

<?php 
require "../vendor/autoload.php";

use App\Routing\Exception\RouteNotFoundException;
use App\Routing\Router;
use App\Routing\Route;
use App\Http\Request;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

$request = new Request();
$router = new Router($request->getGet('url'));

$router->add(new Route('/login', 'App\Controller\SecurityController@displayLoginForm', 'GET'));
$router->add(new Route('/login', 'App\Controller\SecurityController@login', 'POST'));
$router->add(new Route('/register', 'App\Controller\RegisterController@displayRegisterForm', 'GET'));
$router->add(new Route('/register', 'App\Controller\RegisterController@register', 'POST'));
$router->add(new Route('/posts', 'App\Controller\BlogController@index', 'GET'));
$router->add(new Route('/posts/:id', 'App\Controller\BlogController@show', 'GET', ['id', '[0-9]+']));

try {
    $router->getCompiledRoutes();
} catch (RouteNotFoundException $e) {
    echo $e->error404();
}

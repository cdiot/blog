<?php 
session_start();
require "../vendor/autoload.php";

use App\Routing\Exception\RouteNotFoundException;
use App\Routing\Router;
use App\Routing\Route;
use App\Http\Request;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

$request = new Request();
$router = new Router($request->getGet('url'));

$router->add(new Route('/', ['controller'=>'App\Controller\HomeController@index'], 'GET'));
$router->add(new Route('/', ['controller'=>'App\Controller\HomeController@sendMail'], 'POST'));
$router->add(new Route('/login', ['controller'=>'App\Controller\SecurityController@displayLoginForm'], 'GET'));
$router->add(new Route('/login', ['controller'=>'App\Controller\SecurityController@login'], 'POST'));
$router->add(new Route('/register', ['controller'=>'App\Controller\RegisterController@displayRegisterForm'], 'GET'));
$router->add(new Route('/register', ['controller'=>'App\Controller\RegisterController@register'], 'POST'));
$router->add(new Route('/posts', ['controller'=>'App\Controller\BlogController@index'], 'GET'));
$router->add(new Route('/posts/:id', ['controller'=>'App\Controller\BlogController@show'], 'GET', ['id', '[0-9]+']));
$router->add(new Route('/posts/:id', ['controller'=>'App\Controller\BlogController@storeComment'], 'POST', ['id', '[0-9]+']));
$router->add(new Route('/admin', ['controller'=>'App\Controller\Admin\AdminController@index', 'middleware'=>'App\Http\Middleware\AdminMiddleware'], 'GET'));
$router->add(new Route('/admin/add', ['controller'=>'App\Controller\Admin\AdminController@displayInsertForm', 'middleware'=>'App\Http\Middleware\AdminMiddleware'], 'GET'));
$router->add(new Route('/admin/add', ['controller'=>'App\Controller\Admin\AdminController@insert', 'middleware'=>'App\Http\Middleware\AdminMiddleware'], 'POST'));
$router->add(new Route('/admin/modify/:id', ['controller'=>'App\Controller\Admin\AdminController@displayModifyForm', 'middleware'=>'App\Http\Middleware\AdminMiddleware'], 'GET', ['id', '[0-9]+']));
$router->add(new Route('/admin/modify/:id', ['controller'=>'App\Controller\Admin\AdminController@modify', 'middleware'=>'App\Http\Middleware\AdminMiddleware'], 'POST', ['id', '[0-9]+']));
$router->add(new Route('/admin/delete/:id', ['controller'=>'App\Controller\Admin\AdminController@delete', 'middleware'=>'App\Http\Middleware\AdminMiddleware'], 'POST', ['id', '[0-9]+']));

try {
    $router->getCompiledRoutes();
} catch (RouteNotFoundException $e) {
    echo $e->error404();
}

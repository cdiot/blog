<?php

namespace App\Controller;

use App\Http\Request;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

/**
 * Controller 
 */
abstract class Controller
{
    protected $request;

    public function __construct()
    {
        $this->request = new Request;
    }

    public function view(string $path, array $datas = [])
    {
        $loader = new FilesystemLoader('../templates');
        $twig = new Environment($loader, [
            'cache' => false,
        ]);
        $twig->addGlobal('auth', $this->request->getSession('auth'));
        $twig->addGlobal('admin', $this->request->getSession('admin'));
        echo $twig->render($path . '.html.twig', $datas);
    }
}

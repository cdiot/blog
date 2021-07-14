<?php

namespace App\Controller;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

/**
 * Controller 
 */
class Controller
{
    public function view(string $path, array $datas = [])
    {
        $loader = new FilesystemLoader('../templates');
        $twig = new Environment($loader, [
            'cache' => false,
        ]);

        echo $twig->render($path.'.html.twig', $datas);
    }
}

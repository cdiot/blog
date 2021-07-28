<?php
/**
 * Controller Doc Comment
 * 
 * PHP version 7
 * 
 * @category Controller
 * @package  Src/Controller
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
namespace App\Controller;

use App\Http\Request;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

/**
 * Controller Doc Comment
 * 
 * Controller
 * 
 * @category Controller
 * @package  Src/Controller
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
abstract class Controller
{
    protected $request;

    /**
     * Constructor class
     */
    public function __construct()
    {
        $this->request = new Request;
    }

    
    /**
     * Rendezr view
     *  
     * @param string $path  Path to pass
     * @param array  $datas Datas to pass
     * 
     * @return [type]
     */
    public function view(string $path, array $datas = [])
    {
        $loader = new FilesystemLoader('../templates');
        $twig = new Environment(
            $loader, [
            'cache' => false,
            ]
        );
        $twig->addGlobal('auth', $this->request->getSession('auth'));
        $twig->addGlobal('admin', $this->request->getSession('admin'));
        echo $twig->render($path . '.html.twig', $datas);
    }
}

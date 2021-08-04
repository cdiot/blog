<?php
/**
 * Admin Middleware Doc Comment
 * 
 * PHP version 7
 * 
 * @category Middleware
 * @package  Src/Http/Middleware
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
namespace App\Http\Middleware;

use App\Http\Redirect;
use App\Http\Request;

/**
 * Admin Middleware Doc Comment
 * 
 * Auth Middleware
 * 
 * @category Middleware
 * @package  Src/Http/Middleware
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
class AuthMiddleware
{
    private $_request;
    private $_redirect;

    /**
     * Constructor class
     */
    public function __construct()
    {
        $this->_request = new Request();
        $this->_redirect = new Redirect;
        if (!$this->_authorize()) {
            return $this->_redirect->redirect('location: /login');
        }
    }

    /**
     * Allow access to admin
     * 
     * @return [type]
     */
    private function _authorize()
    {
        return $this->_request->getSession('auth') != null;
    }
}

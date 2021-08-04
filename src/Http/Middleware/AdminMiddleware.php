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

use App\Http\Request;

/**
 * Admin Middleware Doc Comment
 * 
 * Admin Middleware
 * 
 * @category Middleware
 * @package  Src/Http/Middleware
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
class AdminMiddleware
{
    private $_request;

    /**
     * Constructor class
     */
    public function __construct()
    {
        $this->_request = new Request();
        if (!$this->_authorize()) {
            echo 'You cannot access this page. Access forbidden';
            exit;
        }
    }

    /**
     * Allow access to admin
     * 
     * @return [type]
     */
    private function _authorize()
    {
        return ($this->_request->getSession('auth') != null and $this->_request->getSession('admin') != null and $this->_request->getSession('admin'));
    }
}

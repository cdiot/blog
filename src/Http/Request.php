<?php
/**
 * Request Doc Comment
 * 
 * PHP version 7
 * 
 * @category Request
 * @package  Src/Http
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
namespace App\Http;

/**
 * Request Doc Comment
 * 
 * Request
 * 
 * @category Request
 * @package  Src/Http
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
class Request
{

    /**
     * GET
     * 
     * @var array
     */
    private $_get;

    /**
     * POST
     * 
     * @var array
     */
    private $_post;
    
    /**
     * FILES
     * 
     * @var array
     */
    private $_files;

    /**
     * REQUEST
     * 
     * @var array
     */
    private $_request;

    /**
     * SERVER
     * 
     * @var array
     */
    private $_server;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->_get = $_GET;
        $this->_post = $_POST;
        $this->_files = $_FILES;
        $this->_request = $_REQUEST;
        $this->_server = $_SERVER;
    }

    /**
     * Get GET
     * 
     * @param mixed $key name
     * 
     * @return string
     */
    public function getGet($key)
    {
        return $this->_get[$key];
    }

    /**
     * Get POST
     * 
     * @param mixed $key name
     * 
     * @return string
     */
    public function getPost($key)
    {
        return $this->_post[$key];
    }

    /**
     * Get SESSION
     * 
     * @param mixed $key name
     * 
     * @return string
     */
    public function getSession($key)
    {
        return $_SESSION[$key] ?? null;
    }

    /**
     * Set SESSION
     * 
     * @param mixed $key   name
     * @param mixed $value value of name
     * 
     * @return [type]
     */
    public function setSession($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Get Cookie
     * 
     * @param mixed $key name
     * 
     * @return string
     */
    public function getCookie($key)
    {
        return $this->_cookie[$key];
    }

    /**
     * Set Cookie
     * 
     * @param mixed $key   name
     * @param mixed $value value of name
     * @param mixed $exp   expires
     * 
     * @return [type]
     */
    public function setCookie($key, $value, $exp)
    {
        setcookie($key, $value, $exp);
    }

    /**
     * Get FILES
     * 
     * @param mixed $key name
     * 
     * @return string
     */
    public function getFiles($key)
    {
        return $this->_files[$key];
    }

    /**
     * Get REQUEST
     * 
     * @param mixed $key name
     * 
     * @return string
     */
    public function getRequest($key)
    {
        return $this->_request[$key];
    }

    /**
     * Get SERVER
     * 
     * @param mixed $key name
     * 
     * @return string
     */
    public function getServer($key)
    {
        return $this->_server[$key];
    }

    /**
     * Get Env
     * 
     * @param mixed $key name
     * 
     * @return array|false|string
     */
    public function getEnv($key)
    {
        return getenv($key);
    }
}

<?php

namespace App\Http;

/**
 * Class Request
 */
class Request
{

    /**
     * @var array
     */
    private $get;

    /**
     * @var array
     */
    private $post;
    
    /**
     * @var array
     */
    private $files;

    /**
     * @var array
     */
    private $request;

    /**
     * @var array
     */
    private $server;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->files = $_FILES;
        $this->request = $_REQUEST;
        $this->server = $_SERVER;
    }

    /**
     * @return string
     */
    public function getGet($key)
    {
        return $this->get[$key];
    }

    /**
     * @return string
     */
    public function getPost($key)
    {
        return $this->post[$key];
    }

    /**
     * @return string
     */
    public function getSession($key)
    {
        return $_SESSION[$key] ?? null;
    }

    public function setSession($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @return string
     */
    public function getCookie($key)
    {
        return $this->cookie[$key];
    }

    public function setCookie($key, $value, $exp)
    {
        setcookie($key, $value, $exp);
    }

    /**
     * @return string
     */
    public function getFiles($key)
    {
        return $this->files[$key];
    }

    /**
     * @return string
     */
    public function getRequest($key)
    {
        return $this->request[$key];
    }

    /**
     * @param $key
     * @return string
     */
    public function getServer($key)
    {
        return $this->server[$key];
    }

    /**
     * @param $key
     * @return array|false|string
     */
    public function getEnv($key)
    {
        return getenv($key);
    }
}

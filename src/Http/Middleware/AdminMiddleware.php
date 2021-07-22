<?php

namespace App\Http\Middleware;

use App\Http\Request;

class AdminMiddleware
{
    private $request;
    public function __construct()
    {
        $this->request = new Request();
        if (!$this->authorize()) {
            echo 'You cannot access this page. Access forbidden';
            exit;
        }
    }

    private function authorize()
    {
        return ($this->request->getSession('auth') != null and $this->request->getSession('admin') != null and $this->request->getSession('admin'));
    }
}

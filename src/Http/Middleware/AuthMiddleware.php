<?php

namespace App\Http\Middleware;

use App\Http\Request;

class AuthMiddleware
{
    private $request;
    public function __construct()
    {
        $this->request = new Request();
        if (!$this->authorize()) {
            return header('location: /login');
            exit;
        }
    }

    private function authorize()
    {
        return $this->request->getSession('auth') != null;
    }
}

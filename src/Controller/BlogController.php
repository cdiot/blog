<?php

namespace App\Controller;

/**
 * Blog Controller 
 */
class BlogController extends Controller
{
    public function index()
    {
        return $this->view('blog/index');
    }

    public function show(int $id)
    {
        return $this->view('blog/show', ['id' => $id]);
    }
}

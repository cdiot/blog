<?php

namespace App\Controller;

/**
 * Blog Controller 
 */
class BlogController
{
    public function index()
    {
        echo 'posts';
    }

    public function show(int $id)
    {
        echo $id;
    }
}

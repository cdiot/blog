<?php

namespace App\Controller;

use App\Manager\PostManager;
use App\Manager\CommentManager;

/**
 * Blog Controller 
 */
class BlogController extends Controller
{
    public function index()
    {
        $postManager = new PostManager();
        $posts = $postManager->findAll();
        return $this->view('blog/index', ['posts' => $posts]);
    }

    public function show(int $id)
    {
        $postManager = new PostManager();
        $post = $postManager->find($id);
        $commentManager = new CommentManager();
        $comments = $commentManager->findByPost($id);
        return $this->view('blog/show', ['post' => $post,'comments' => $comments]);
    }
}

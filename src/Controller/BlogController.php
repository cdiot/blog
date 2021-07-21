<?php

namespace App\Controller;

use App\Manager\PostManager;
use App\Manager\CommentManager;

/**
 * Blog Controller 
 */
class BlogController extends Controller
{
    private $postManager;
    private $commentManager;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
    }

    public function index()
    {
        $posts = $this->postManager->findAll();
        return $this->view('blog/index', ['posts' => $posts]);
    }

    public function show(int $id)
    {
        $post = $this->postManager->find($id);
        $comments = $this->commentManager->findByPost($id);
        return $this->view('blog/show', ['post' => $post, 'comments' => $comments]);
    }
}

<?php

namespace App\Controller;

use App\Manager\PostManager;
use App\Manager\CommentManager;
use App\Entity\Comment;
use App\Http\Request;

/**
 * Blog Controller 
 */
class BlogController extends Controller
{
    private $postManager;
    private $commentManager;
    private $request;

    public function __construct()
    {
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
        $this->request = new Request();
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
    
    public function storeComment($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $comment = new Comment(
                [
                    'content' => $this->request->getPost('content'),
                    'postId' => $id,
                    'userId' => $this->request->getSession('userId')
                ]
            );
            $commentManager = new CommentManager();
            if (!empty($this->request->getPost('content')) && !empty($id) && !empty($this->request->getSession('userId'))) {
                $commentManager->add($comment);
                return header('Location: /posts');
            } else {
                echo 'Formulaire incomplets';
            }
        } else {
            echo 'Formulaire non valide';
        }
    }
}

<?php

namespace App\Controller\Admin;

use App\Controller\Controller;
use App\Manager\PostManager;
use App\Entity\Post;
use App\Manager\CommentManager;


/**
 * Admin Controller  
 */
class AdminController extends Controller
{
    private $postManager;
    private $commentManager;

    public function __construct()
    {
        parent::__construct();
        $this->postManager = new PostManager();
        $this->commentManager = new CommentManager();
    }

    public function index()
    {
        $posts = $this->postManager->findAll();
        $comments = $this->commentManager->findAll();
        return $this->view('admin/index', ['posts' => $posts, 'comments' => $comments]);
    }

    public function insert()
    {
        if ($this->request->getServer('REQUEST_METHOD') == 'POST') {
            if (!empty($this->request->getPost('title')) && !empty($this->request->getPost('excerpt')) && !empty($this->request->getPost('content'))) {
                $PostManager = new PostManager();
                $post = new Post([
                    'title' => $this->request->getPost('title'),
                    'excerpt' => $this->request->getPost('excerpt'),
                    'content' => $this->request->getPost('content'),
                    'userId' => $this->request->getSession('userId')
                ]);
                $PostManager->add($post);
                return header('Location: /admin');
            }
        }
    }

    public function displayInsertForm()
    {
        return $this->view('admin/add');
    }

    public function modify($id)
    {
        if ($this->request->getServer('REQUEST_METHOD') == 'POST') {
            if (!empty($this->request->getPost('title')) && !empty($this->request->getPost('excerpt')) && !empty($this->request->getPost('content'))) {
                $PostManager = new PostManager();
                $post = new Post([
                    'id' => $id,
                    'title' => $this->request->getPost('title'),
                    'excerpt' => $this->request->getPost('excerpt'),
                    'content' => $this->request->getPost('content'),
                    'userId' => $this->request->getSession('userId')
                ]);
                $PostManager->update($post);
                return header('Location: /admin');
            }
        }
    }

    public function displayModifyForm($id)
    {
        $post = $this->postManager->find($id);
        return $this->view('admin/update', ['post' => $post]);
    }

    public function delete($id)
    {
        if ($this->request->getServer('REQUEST_METHOD') == 'POST') {
            if (!empty($id)) {
                $this->postManager->delete($id);
                return header('Location: /admin');
            }
        }
    }
}

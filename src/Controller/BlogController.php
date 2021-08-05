<?php

/**
 * Blog Controller Doc Comment
 * 
 * PHP version 7
 * 
 * @category Controller
 * @package  Src/Controller
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */

namespace App\Controller;

use App\Manager\PostManager;
use App\Manager\CommentManager;
use App\Entity\Comment;

/**
 * Blog Controller Doc Comment
 * 
 * Blog Controller
 * 
 * @category Controller
 * @package  Src/Controller
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
class BlogController extends Controller
{
    private $_postManager;
    private $_commentManager;

    /**
     * Constructor class
     */
    public function __construct()
    {
        parent::__construct();
        $this->_postManager = new PostManager();
        $this->_commentManager = new CommentManager();
    }

    /**
     * Show the list of all Posts
     * 
     * @return string
     */
    public function index()
    {
        $posts = $this->_postManager->findAll();
        return $this->view('blog/index', ['posts' => $posts]);
    }

    /**
     * Show one Posts
     * 
     * @param int $postId id of post
     * 
     * @return string
     */
    public function show(int $postId)
    {
        $post = $this->_postManager->find($postId);
        $comments = $this->_commentManager->findByPost($postId);
        return $this->view('blog/show', ['post' => $post, 'comments' => $comments]);
    }

    /**
     * Store one comment in database
     * 
     * @param int $postId id of post
     * 
     * @return void
     */
    public function storeComment(int $postId)
    {
        if ($this->request->getServer('REQUEST_METHOD') == 'POST') {
            if (empty($this->request->getPost('message')) || empty($postId) || empty($this->request->getSession('userId'))) {
                throw new \Exception("Tous les champs ne sont pas remplis.");
            }
            $comment = new Comment(
                [
                    'message' => $this->request->getPost('message'),
                    'postId' => $postId,
                    'userId' => $this->request->getSession('userId')
                ]
            );
            $commentManager = new CommentManager();
                $commentManager->add($comment);
                return $this->redirect->redirect('/posts');
        }
    }
}

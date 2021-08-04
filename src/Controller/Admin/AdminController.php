<?php
/**
 * Admin Controller Doc Comment
 * 
 * PHP version 7
 * 
 * @category Controller
 * @package  Src/Controller/Admin
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
namespace App\Controller\Admin;

use App\Controller\Controller;
use App\Manager\PostManager;
use App\Entity\Post;
use App\Entity\Comment;
use App\Manager\CommentManager;


/**
 * Admin Controller Doc Comment
 * 
 * Admin Controller
 * 
 * @category Controller
 * @package  Src/Controller/Admin
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
class AdminController extends Controller
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
     * Show admin panel
     *  
     * @return [type]
     */
    public function index()
    {
        $posts = $this->_postManager->findAll();
        $comments = $this->_commentManager->findAll();
        return $this->view('admin/index', ['posts' => $posts, 'comments' => $comments]);
    }

    /**
     * Allow to insert post
     * 
     * @return [type]
     */
    public function insert()
    {
        if ($this->request->getServer('REQUEST_METHOD') == 'POST') {
            if (!empty($this->request->getPost('title')) && !empty($this->request->getPost('excerpt')) && !empty($this->request->getPost('content'))) {
                $PostManager = new PostManager();
                $post = new Post(
                    [
                    'title' => $this->request->getPost('title'),
                    'excerpt' => $this->request->getPost('excerpt'),
                    'content' => $this->request->getPost('content'),
                    'userId' => $this->request->getSession('userId')
                    ]
                );
                $PostManager->add($post);
                return $this->redirect('/admin');
            }
        }
    }

    /**
     * Show insert one form
     * 
     * @return [type]
     */
    public function displayInsertForm()
    {
        return $this->view('admin/add');
    }

    /**
     * Allow to modify one post
     * 
     * @param int $postId id of the post 
     * 
     * @return [type]
     */
    public function modify(int $postId)
    {
        if ($this->request->getServer('REQUEST_METHOD') == 'POST') {
            if (!empty($this->request->getPost('title')) && !empty($this->request->getPost('excerpt')) && !empty($this->request->getPost('content'))) {
                $PostManager = new PostManager();
                $post = new Post(
                    [
                    'id' => $postId,
                    'title' => $this->request->getPost('title'),
                    'excerpt' => $this->request->getPost('excerpt'),
                    'content' => $this->request->getPost('content'),
                    'userId' => $this->request->getSession('userId')
                    ]
                );
                $PostManager->update($post);
                return $this->redirect('/admin');
            }
        }
    }

    /**
     * Show modify form
     * 
     * @param int $postId id of the post
     * 
     * @return [type]
     */
    public function displayModifyForm(int $postId)
    {
        $post = $this->_postManager->find($postId);
        return $this->view('admin/update', ['post' => $post]);
    }

    /**
     * Allow to delete one post
     * 
     * @param int $postId id of the post
     * 
     * @return [type]
     */
    public function delete(int $postId)
    {
        if ($this->request->getServer('REQUEST_METHOD') == 'POST') {
            if (!empty($postId)) {
                $this->_postManager->delete($postId);
                return $this->redirect('/admin');
            }
        }
    }

    /**
     * Allow to approve one comment
     * 
     * @param int $commentId id of the comment
     * 
     * @return [type]
     */
    public function approve(int $commentId)
    {

        if ($this->request->getServer('REQUEST_METHOD') == 'POST') {
            if (!empty($commentId)) {
                $commentManager = new CommentManager();
                $comment = new Comment(
                    [
                    'id' => $commentId,
                    'approvement' => 1
                    ]
                );
                $commentManager->approve($comment);
                return $this->redirect('/admin');
            }
        }
    }

    /**
     * Allow to delete one comment
     * 
     * @param int $commentId id of the comment
     * 
     * @return [type]
     */
    public function deleteComment(int $commentId)
    {
        if ($this->request->getServer('REQUEST_METHOD') == 'POST') {
            if (!empty($commentId)) {
                $this->_commentManager->delete($commentId);
                return $this->redirect('/admin');
            }
        }
    }
}

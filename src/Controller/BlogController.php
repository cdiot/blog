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
     * @return [type]
     */
    public function index()
    {
        $posts = $this->_postManager->findAll();
        return $this->view('blog/index', ['posts' => $posts]);
    }

    /**
     * Show one Posts
     * 
     * @param int $id id of post
     * 
     * @return [type]
     */
    public function show(int $id)
    {
        $post = $this->_postManager->find($id);
        $comments = $this->_commentManager->findByPost($id);
        return $this->view('blog/show', ['post' => $post, 'comments' => $comments]);
    }
    
    /**
     * Store one comment in database
     * 
     * @param int $id id of post
     * 
     * @return [type]
     */
    public function storeComment(int $id)
    {
        if ($this->request->getServer('REQUEST_METHOD') == 'POST') {

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

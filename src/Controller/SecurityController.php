<?php
/**
 * Security Controller Doc Comment
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

use App\Manager\UserManager;

/**
 * Security Controller Doc Comment
 * 
 * Security Controller
 * 
 * @category Controller
 * @package  Src/Controller
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
class SecurityController extends Controller
{
    /**
     * Allow to login
     * 
     * @return [type]
     */
    public function login() 
    {
        if (isset($_POST['mail'])) {
            $UserManager = new UserManager();
            $user = $UserManager->findOneByMail($_POST['mail']);
            if ($user) {
                if (password_verify($this->request->getPost('password'), $user->getPassword())) {
                    $this->request->setSession('auth',  $user->getMail());
                    $this->request->setSession('userId',  $user->getId());
                    $this->request->setSession('admin', $user->getRole());
                    return header('Location: /');
                } else {
                    echo 'Mot de passe incorrect';
                }
            } else {
                echo 'Adresse Mail incorrect';
            }
        }
    }

    /**
     * Show login form
     * 
     * @return [type]
     */
    public function displayLoginForm()
    {
        return $this->view('security/index');
    }

    /**
     * Allow to logout
     * 
     * @return [type]
     */
    public function logout()
    {
        unset($_SESSION);
        session_destroy();
        return header('Location: /');
    }
}

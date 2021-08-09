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
     * @return void
     */
    public function login()
    {
        if (empty($this->request->getPost('mail'))  || empty($this->request->getPost('password'))) {
            throw new \Exception("Tous les champs ne sont pas remplis.");
        }
        if ($this->request->getServer('REQUEST_METHOD') == 'POST') {
            $UserManager = new UserManager();
            $user = $UserManager->findOneByMail($this->request->getPost('mail'));
            if (!password_verify($this->request->getPost('password'), $user->getPassword())) {
                throw new \Exception("Mauvais mot de passe ou adresse mail");
            }
            if ($user) {
                $this->request->setSession('admin', $user->isAdmin());
                $this->request->setSession('auth',  $user->getMail());
                $this->request->setSession('userId',  $user->getId());
                $this->redirect->redirect('/');
            }
        }
    }

    /**
     * Show login form
     * 
     * @return string
     */
    public function displayLoginForm()
    {
        return $this->view('security/index');
    }

    /**
     * Allow to logout
     * 
     * @return void
     */
    public function logout()
    {
        unset($_SESSION);
        session_destroy();
        return $this->redirect->redirect('/login');
    }
}

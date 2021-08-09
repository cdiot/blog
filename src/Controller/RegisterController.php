<?php

/**
 * Register Controller Doc Comment
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
use App\Entity\User;

/**
 * Register Controller Doc Comment
 * 
 * Register Controller
 * 
 * @category Controller
 * @package  Src/Controller
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
class RegisterController extends Controller
{
    /**
     * Allow to register
     * 
     * @return void
     */
    public function register()
    {
        if ($this->request->getServer('REQUEST_METHOD') == 'POST') {
            if (empty($this->request->getPost('firstname')) || empty($this->request->getPost('lastname')) || empty($this->request->getPost('mail')) || empty($this->request->getPost('password'))) {
                throw new \Exception("Tous les champs ne sont pas remplis.");
            }
            if (!filter_var($this->request->getPost('mail'), FILTER_VALIDATE_EMAIL)) {
                throw new \Exception("Email non valide.");
            }
            $UserManager = new UserManager();

            $user = new User(
                [
                    'firstname' => $this->request->getPost('firstname'),
                    'lastname' => $this->request->getPost('lastname'),
                    'mail' => $this->request->getPost('mail'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
                ]
            );
            $UserManager->add($user);
            return 'Formulaire non valide';
        }
    }

    /**
     * Show register form
     * 
     * @return string
     */
    public function displayRegisterForm()
    {
        return $this->view('register/index');
    }
}

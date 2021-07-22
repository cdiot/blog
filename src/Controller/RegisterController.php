<?php

namespace App\Controller;

use App\Manager\UserManager;
use App\Entity\User;

/**
 * Register Controller  
 */
class RegisterController extends Controller
{
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $UserManager = new UserManager();

            $user = new User(
                [
                    'firstname' => $this->request->getPost('firstname'),
                    'lastname' => $this->request->getPost('lastname'),
                    'mail' => filter_var($this->request->getPost('mail'), FILTER_VALIDATE_EMAIL),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
                ]
            );
            if (!empty($this->request->getPost('firstname')) && !empty($this->request->getPost('lastname')) && !empty($this->request->getPost('mail')) && !empty($this->request->getPost('password'))) {

                $UserManager->add($user);
            } else {
                echo 'Formulaire incomplets';
            }
        } else {
            echo 'Formulaire non valide';
        }
    }

    public function displayRegisterForm()
    {
        return $this->view('register/index');
    }
}

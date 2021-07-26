<?php

namespace App\Controller;

use App\Manager\UserManager;

/**
 * Security Controller  
 */
class SecurityController extends Controller
{
    public function login() 
    {
        if (isset($_POST['mail'])) {
            $UserManager = new UserManager();
            $user = $UserManager->findOneByMail($_POST['mail']);
            if($user) {
                if(password_verify($this->request->getPost('password'), $user->getPassword())) {
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

    public function displayLoginForm() {
        return $this->view('security/index');
    }

    public function logout()
    {
        unset($_SESSION);
        session_destroy();
        return header('Location: /');
    }
}
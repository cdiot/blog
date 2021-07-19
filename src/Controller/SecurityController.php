<?php

namespace App\Controller;

use App\Manager\UserManager;
use App\HTTP\Request;

/**
 * Security Controller  
 */
class SecurityController extends Controller
{
    public function login() 
    {
        if (isset($_POST['mail'])) {
            $UserManager = new UserManager();
            $request = new Request();
            $user = $UserManager->findOneByMail($_POST['mail']);
            if($user) {
                if(password_verify($_POST['password'], $user->getPassword())) {
                    $request->setSession('auth',  $user->getMail());
                    $request->setSession('admin', $user->getRole());
                    return header('Location: /admin/posts');
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
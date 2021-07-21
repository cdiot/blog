<?php

namespace App\Controller;

use App\Manager\UserManager;
use App\Entity\User;
use App\HTTP\Request;

/**
 * Register Controller  
 */
class RegisterController extends Controller
{
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $UserManager = new UserManager();
            $request = new Request();

            $user = new User(
                [
                    'firstname' => $request->getPost('firstname'),
                    'lastname' => $request->getPost('lastname'),
                    'mail' => filter_var($request->getPost('mail'), FILTER_VALIDATE_EMAIL),
                    'password' => password_hash($request->getPost('password'), PASSWORD_DEFAULT)
                ]
            );
            if (!empty($request->getPost('firstname')) && !empty($request->getPost('lastname')) && !empty($request->getPost('mail')) && !empty($request->getPost('password'))) {

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

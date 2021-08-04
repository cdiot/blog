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
     * @return [type]
     */
    public function register()
    {
        if ($this->request->getServer('REQUEST_METHOD') == 'POST') {
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

    /**
     * Show register form
     * 
     * @return [type]
     */
    public function displayRegisterForm()
    {
        return $this->view('register/index');
    }
}

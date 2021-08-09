<?php

/**
 * User Manager Doc Comment
 * 
 * PHP version 7
 * 
 * @category Manager
 * @package  Src/Manager
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */

namespace App\Manager;

use App\Entity\User;
use PDO;


/**
 * User Manager Doc Comment
 * 
 * Queries Manager for User.
 * 
 * @category Manager
 * @package  Src/Manager
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
class UserManager extends Manager
{

    /**
     * Find a user found thanks to his email
     *
     * @param $mail mail of User
     * 
     * @return mixed
     */
    public function findOneByMail($mail)
    {
        $req = $this->database->pdo()->prepare('SELECT * FROM users WHERE mail = :mail');
        $req->bindValue(':mail', $mail);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_PROPS_LATE);
        $userData = $req->fetch();
        $user = new User($userData);

        return $user;
    }

    /**
     * Register User
     *
     * @param User $user instance of User
     * 
     * @return void
     */
    public function add(User $user): void
    {
        $req = $this->database->pdo()->prepare('INSERT INTO users(firstname, lastname, mail, password, role) VALUES(:firstname, :lastname, :mail, :password, 0)');
        $req->bindValue(':firstname', $user->getFirstname());
        $req->bindValue(':lastname', $user->getLastname());
        $req->bindValue(':mail', $user->getMail());
        $req->bindValue(':password', $user->getPassword());
        $req->execute();
    }
}

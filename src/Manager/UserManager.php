<?php

namespace App\Manager;

use App\Entity\User;
use PDO;


/**
 * Queries Manager for User. 
 */
class UserManager extends Manager
{

    /**
     * Return a user found thanks to his email
     *
     * @param  $username
     * @return mixed
     */
    public function findOneByMail($mail)
    {
        $req = $this->db->pdo()->prepare('SELECT * FROM users WHERE mail = :mail');
        $req->bindValue(':mail', $mail);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, User::class);
        $user = $req->fetch();

        return $user;
    }

    /**
     * Register User
     *
     * @param User $user
     * @return void
     */
    public function add(User $user): void
    {
        $req = $this->db->pdo()->prepare('INSERT INTO users(firstname, lastname, mail, password, role) VALUES(:firstname, :lastname, :mail, :password, 0)');
        $req->bindValue(':firstname', $user->getFirstname());
        $req->bindValue(':lastname', $user->getLastname());
        $req->bindValue(':mail', $user->getMail());
        $req->bindValue(':password', $user->getPassword());
        $req->execute();
    }
}

<?php
/**
 * User Entity Doc Comment
 * 
 * PHP version 7
 * 
 * @category Entity
 * @package  Src/Entity
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
namespace App\Entity;

/**
 * User Entity Doc Comment
 * 
 * User Entity
 * 
 * @category Entity
 * @package  Src/Entity
 * @author   cdiot <christopher.diot5@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/cdiot/blog
 */
class User extends Entity
{
    /**
     * Id of User
     * 
     * @var int
     */
    private $_id;

    /**
     * Firstname of User
     * 
     * @var string
     */
    private $_firstname;

    /**
     * Lastname of User
     * 
     * @var string
     */
    private $_lastname;

    /**
     * Mail of User
     * 
     * @var string
     */
    private $_mail;

    /**
     * Password of User
     * 
     * @var string
     */
    private $_password;

    /**
     * Role of User
     * 
     * @var bool
     */
    private $_admin;

    /**
     * Get id of User
     * 
     * @return int
     */
    public function getId(): int
    {
        return $this->_id;
    }

    /**
     * Set id of User
     * 
     * @param int $userId id of User
     * 
     * @return void
     */
    public function setId(int $userId)
    {
        $this->_id = (int) $userId;
    }

    /**
     * Get firstname of User
     * 
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->_firstname;
    }

    /**
     * Set firsname of User
     * 
     * @param string $firstname firstname of User
     * 
     * @return void
     */
    public function setFirstname(string $firstname): void
    {
        $this->_firstname = $firstname;
    }

    /**
     * Get Lastname of User
     * 
     * @return string
     */
    public function getLastname(): string
    {
        return $this->_lastname;
    }

    /**
     * Set Lastname of User
     * 
     * @param string $lastname lastname of User
     * 
     * @return void
     */
    public function setLastname(string $lastname): void
    {
        $this->_lastname = $lastname;
    }

    /**
     * Get mail of User
     * 
     * @return string
     */
    public function getMail(): string
    {
        return $this->_mail;
    }

    /**
     * Set mail of User
     * 
     * @param string $mail mail of User
     * 
     * @return void
     */
    public function setMail(string $mail): void
    {
        $this->_mail = $mail;
    }

    /**
     * Get password of User
     * 
     * @return string
     */
    public function getPassword(): string
    {
        return $this->_password;
    }

    /**
     * Set password of User
     * 
     * @param string $password password of User
     * 
     * @return void
     */
    public function setPassword(string $password): void
    {
        $this->_password = $password;
    }

    /**
     * Get Role of User
     * 
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->_admin;
    }

    /**
     * Set Role of User
     * 
     * @param string $admin role of User
     * 
     * @return void
     */
    public function setAdmin(bool $admin): void
    {
        $this->_isAdmin = $admin;
    }
}

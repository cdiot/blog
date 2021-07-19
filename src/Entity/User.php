<?php

namespace App\Entity;

class User extends Entity
{
  /**
   * @var int
   */
  private $id;

  /**
   * @var string
   */
  private $firstname;

  /**
   * @var string
   */
  private $lastname;

  /**
   * @var string
   */
  private $mail;

  /**
   * @var string
   */
  private $password;

  /**
   * @var bool
   */
  private $role;

  /**
   * @return int
   */
  public function getId(): int
  {
    return $this->id;
  }

  /**
   * @param int $id
   */
  public function setId(int $id)
  {
    $this->id = (int) $id;
  }

  /**
   * @return string
   */
  public function getFirstname(): string
  {
    return $this->firstname;
  }

  /**
   * @param string $firstname
   */
  public function setFirstname(string $firstname): void
  {
    $this->firstname = $firstname;
  }

  /**
   * @return string
   */
  public function getLastname(): string
  {
    return $this->lastname;
  }

  /**
   * @param string $lastname
   */
  public function setLastname(string $lastname): void
  {
    $this->lastname = $lastname;
  }

  /**
   * @return string
   */
  public function getMail(): string
  {
    return $this->mail;
  }

  /**
   * @param string $mail
   */
  public function setMail(string $mail): void
  {
    $this->mail = $mail;
  }

  /**
   * @return string
   */
  public function getPassword(): string
  {
    return $this->password;
  }

  /**
   * @param string $password
   */
  public function setPassword(string $password): void
  {
    $this->password = $password;
  }

  /**
   * @return bool
   */
  public function getRole(): bool
  {
    return $this->role;
  }

  /**
   * @param string $role
   */
  public function setRole(bool $role): void
  {
    $this->role = $role;
  }
}

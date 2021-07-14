<?php

namespace App\Manager;

abstract class Manager
{

  protected $db;

  public function __construct()
  {
    $this->db = Database::getInstance();
  }
}

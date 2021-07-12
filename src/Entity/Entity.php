<?php

namespace App\Entity;

abstract class Entity
{
  public function __construct($datas = [])
  {
    if (!empty($datas)) {
      $this->hydrate($datas);
    }
  }

  public function hydrate($datas)
  {
    foreach ($datas as $key => $value) {
      $method = 'set' . ucfirst($key);
      if (is_callable([$this, $method])) {
        $this->$method($value);
      }
    }
  }
}

<?php

namespace App\Http\Controllers;


class Apple implements Food
{
  public function __construct($weight)
  {
    return $this->weight = $weight;
  }

  public function weight()
  {
    return $this->weight();
  }
}

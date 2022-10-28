<?php

namespace App\Facades;

class ProdutoFacade
{
  public static function getFacadeAccessor()
  {
    return 'ProductRepository';
  }
}
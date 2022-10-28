<?php

namespace App\Repositories;

use App\Models\Product;

class CategoryRepository extends BaseRepository
{
  public function __construct()
  {
    parent::__construct(Product::class);
  }
}
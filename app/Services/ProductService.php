<?php

namespace App\Services;

class ProductService
{
  public function store(array $data)
  {
    $service = new ImageService();
    $image = $service->getPathAndUrl($data['image'], 'product');
    dd($image);
  }

}
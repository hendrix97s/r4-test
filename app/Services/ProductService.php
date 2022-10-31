<?php

namespace App\Services;

use App\Facades\CategoryFacade;
use App\Facades\CategoryRepositoryFacade;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Database\Factories\CategoryFactory;
use Illuminate\Http\UploadedFile;

class ProductService
{
  public function store(array $data)
  {
    $categoryId = $this->getCategoryId($data);
    $service = new ImageService();
    $image = $service->getPathAndUrl($data['image'], 'product');
    $data = [...$data, ...$image];
    $repository = new ProductRepository();
    return $repository->create($data);
  }

  public function update(string $uuid, array $data)
  {
    $repository = new ProductRepository();
    $product = $repository->findByUuid($uuid);
    if(!$product) abort(404);

    $this->getCategoryId($data);

    if(isset($data['image']) && $data['image'] instanceof UploadedFile) {
      $service = new ImageService();
      $service->delete($product->image, 'product');
      $image = $service->getPathAndUrl($data['image'], 'product');
      $data = [...$data, ...$image];
    }

    $product->update($data);
    return $product->fresh();
  }

  public function getCategoryId(&$data)
  {
    if(!isset($data['category_uuid'])) return;
    $category = (new CategoryRepository())->findByUuid($data['category_uuid']);
    if(!$category) abort(404);
    unset($data['category_uuid']);
    $data['category_id'] = $category->id;
  }
}
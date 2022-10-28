<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Services\ProductService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ProductTest extends TestCase
{

  use RefreshDatabase;

  public function setUp(): void
  {
    parent::setUp();
  }

  public function testProductIndex()
  {
    $this->login();
    $response = $this->get(route('product.index'));
    $response->assertStatus(200);
  }

  public function testProductStore()
  {
    $this->withExceptionHandling();
    $this->login();
    $category  = Category::factory()->create();

    $file = file_get_contents('https://avatars.dicebear.com/api/bottts/'.Auth::user()->uuid.'.jpg?background=black');
    $file = UploadedFile::fake()->create('avatar.jpg', $file);

    $payload = [
      'name'          => 'Test Product Updated',
      'image'         => $file,
      'category_uuid' => $category->uuid
    ];

    $response = $this->post(route('product.store'), $payload);
    $response->assertStatus(200);
  }

  public function testProductService()
  {

    $this->login();
    $file = file_get_contents('https://avatars.dicebear.com/api/bottts/'.Auth::user()->uuid.'.jpg?background=black');
    $file = UploadedFile::fake()->create('avatar.jpg', $file);

    $category = Category::factory()->create();
    $payload = [
      'name'          => 'Test Product Updated',
      'image'         => $file,
      'category_uuid' => $category->uuid
    ];

    $service = new ProductService();
    $service->store($payload);
  }

  public function testProductShow()
  {
    $this->login();
    
    $response = $this->get(route('product.show', 1));
    $response->assertStatus(200);
  }

  public function testProductUpdate()
  {
    $this->login();

    $category  = Category::factory()->create();
    $product = Product::factory()->create();

    $file = file_get_contents('https://avatars.dicebear.com/api/bottts/'.Auth::user()->uuid.'.jpg?background=black');
    $file = UploadedFile::fake()->create('avatar.jpg', $file);

    $payload = [
      'name'          => 'Test Product Updated',
      'image'         => $file,
      'category_uuid' => $category->uuid
    ];

    $param = ['uuid' => $product->uuid];
    $response = $this->put(route('product.update', $param), $payload);
    $response->assertStatus(200);
  }

  public function testProductDestroy()
  {
    $this->login();
    $product = Product::factory()->create();
    $param = ['uuid' => $product->uuid];
    $response = $this->delete(route('product.destroy', $param));
    $response->assertStatus(200);
  }
}

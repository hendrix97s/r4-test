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
use Illuminate\Support\Facades\Storage;
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
    Product::factory()->count(3)->create();
    $response = $this->get(route('product.index'));
    $response->assertStatus(200);
    $response->assertJsonCount(3, 'data');
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
    Storage::disk('product')->assertExists($response->json('image'));
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
    $product = $service->store($payload);
    $this->assertNotNull($product);
    Storage::disk('product')->assertExists($product->image);
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
    $this->assertNull(Product::find($product->id));
  }
}

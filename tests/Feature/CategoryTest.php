<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
  use RefreshDatabase;

  public function setUp(): void
  {
    parent::setUp();
  }


  public function testCategoryIndex()
  {
    $this->login();
    $response = $this->get(route('categories.index'));
    $response->assertStatus(200);
  }
}

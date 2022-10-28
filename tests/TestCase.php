<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Auth;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;


  public function setUp(): void
  {
    parent::setUp();
    $this->seed();
  }
  
  public function login()
  {
    $user = User::where('email', 'joeh.doe@test.com')->first();
    Auth::login($user);
  }
}

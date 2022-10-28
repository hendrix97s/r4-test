<?php

use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
  return ['sucess' => true];
});

Route::resource('product', ProductController::class)->except(['create', 'edit'])->parameters(['product' => 'uuid']);
Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
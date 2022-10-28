<?php

use App\Http\Controllers\Auth\AuthenticateController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('product', ProductController::class)->except(['create', 'edit'])->parameters(['product' => 'uuid']);
Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('logout', [AuthenticateController::class, 'logout'])->name('logout');
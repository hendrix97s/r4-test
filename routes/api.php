<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('product', ProductController::class)->except(['create', 'edit'])->parameters(['product' => 'uuid']);
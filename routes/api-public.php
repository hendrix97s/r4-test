<?php

use App\Http\Controllers\Auth\AuthenticateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthenticateController::class, 'authenticate'])->name('login');
Route::get('logout', [AuthenticateController::class, 'logout'])->name('logout');

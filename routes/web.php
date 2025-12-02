<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\FAQsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

//----------------------------------------
// Primary routes
//----------------------------------------

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Brand
Route::get('/brand', [BrandController::class, 'index'])->name('brand');

// FAQs
Route::get('/faqs', [FAQsController::class, 'index'])->name('faqs');

// Product
Route::get('/product', [ProductController::class, 'index'])->name('product');

//----------------------------------------
// Admin routes
//----------------------------------------

// Admin dashboard
Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

//----------------------------------------
// Cart routes
//----------------------------------------

// Index
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

//----------------------------------------
// Other routes
//----------------------------------------

// Search
Route::get('/search', [SearchController::class, 'index'])->name('search');

// User
Route::get('/user', [UserController::class, 'index'])->name('user');

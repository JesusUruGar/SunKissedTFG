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
Route::get('/product/{id}', [ProductController::class, 'index'])->name('product');

//----------------------------------------
// Admin routes
//----------------------------------------

// Admin dashboard
Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

// Users
Route::get('/admin/users', [AdminController::class, 'indexUsers'])->name('admin.users');

// Products
Route::get('/admin/products', [AdminController::class, 'indexProducts'])->name('admin.products');
Route::get('/admin/products/create', [AdminController::class, 'createProduct'])->name('admin.products.create');
Route::get('/admin/products/edit/{id}', [AdminController::class, 'editProduct'])->name('admin.products.edit');
Route::post('/admin/products/save/{id?}', [AdminController::class, 'saveProduct'])->name('admin.products.save');
Route::delete('/admin/products/delete/{id}', [AdminController::class, 'deleteProduct'])->name('admin.products.delete');

// Product Images
Route::delete('/admin/product-images/{id}', [AdminController::class, 'destroyImage'])->name('product-images.destroy');
Route::post('/admin/product-images/{id}/set-primary', [AdminController::class, 'setPrimaryImage'])->name('product-images.set-primary');
Route::post('/admin/product-images/reorder', [AdminController::class, 'reorderImages'])->name('product-images.reorder');

// Stock Management
Route::get('/admin/products/stock/{id}', [AdminController::class, 'indexStock'])->name('admin.stock');
Route::post('/admin/products/stock/update/{id}', [AdminController::class, 'updateStock'])->name('admin.stock.update');

// Categories
Route::get('/admin/categories', [AdminController::class, 'indexCategories'])->name('admin.categories');
Route::get('/admin/categories/create', [AdminController::class, 'createCategory'])->name('admin.categories.create');
Route::get('/admin/categories/edit/{id}', [AdminController::class, 'editCategory'])->name('admin.categories.edit');
Route::post('/admin/categories/save/{id?}', [AdminController::class, 'saveCategory'])->name('admin.categories.save');
Route::delete('/admin/categories/delete/{id}', [AdminController::class, 'deleteCategory'])->name('admin.categories.delete');

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

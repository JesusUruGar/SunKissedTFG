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
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Models\Order;

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
// Auth routes
//----------------------------------------

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('show.register');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('show.login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//----------------------------------------
// Admin routes
//----------------------------------------

Route::middleware(['auth', 'admin'])->group(function () {

    // Admin dashboard
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    // Users
    Route::get('/admin/users', [AdminController::class, 'indexUsers'])->name('admin.users');
    Route::get('/admin/users/edit/{id}', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::post('/admin/users/save/{id}', [AdminController::class, 'saveUser'])->name('admin.users.save');
    Route::delete('/admin/users/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');

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
    Route::get('/admin/products/stock/create/{id}', [AdminController::class, 'addStock'])->name('admin.stock.add');
    Route::get('/admin/products/stock/edit/{idProduct}/{idStock}', [AdminController::class, 'editStock'])->name('admin.stock.edit');
    Route::post('/admin/products/stock/save/{idProduct}/{idStock?}', [AdminController::class, 'saveStock'])->name('admin.stock.save');
    Route::delete('/admin/products/stock/delete/{idProduct}/{idStock}', [AdminController::class, 'deleteStock'])->name('admin.stock.delete');

    // Categories
    Route::get('/admin/categories', [AdminController::class, 'indexCategories'])->name('admin.categories');
    Route::get('/admin/categories/create', [AdminController::class, 'createCategory'])->name('admin.categories.create');
    Route::get('/admin/categories/edit/{id}', [AdminController::class, 'editCategory'])->name('admin.categories.edit');
    Route::post('/admin/categories/save/{id?}', [AdminController::class, 'saveCategory'])->name('admin.categories.save');
    Route::delete('/admin/categories/delete/{id}', [AdminController::class, 'deleteCategory'])->name('admin.categories.delete');

    // Orders
    Route::get('/admin/orders', [AdminController::class, 'indexOrders'])->name('admin.orders');
    Route::get('/admin/orders/view/{id}', [AdminController::class, 'viewOrder'])->name('admin.orders.view');
    Route::post('/admin/orders/update-status/{id}', [AdminController::class, 'updateOrderStatus'])->name('admin.orders.update-status');

});

//----------------------------------------
// Cart routes
//----------------------------------------

// Index
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

//----------------------------------------
// Checkout routes
//----------------------------------------

Route::middleware('auth')->group(function () {

    Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/success/{order?}', [CheckoutController::class, 'success'])->name('checkout.success');

});


//----------------------------------------
// User routes
//----------------------------------------

Route::middleware('auth')->group(function () {

    Route::get('/user/order-history', [UserController::class, 'orderHistory'])->name('user.order-history');
    Route::get('/user/order/{id}', [UserController::class, 'viewOrder'])->name('user.order.view');

});



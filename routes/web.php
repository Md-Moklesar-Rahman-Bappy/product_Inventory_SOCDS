<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\AssetModelController;

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Resource routes for Product
    Route::resource('products', ProductController::class);
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/show/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/edit/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
;
    // Resource routes for Categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/show/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/edit/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Resource routes for Brands
    Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
    Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
    Route::post('/brands/store', [BrandController::class, 'store'])->name('brands.store');
    Route::get('/brands/show/{id}', [BrandController::class, 'show'])->name('brands.show');
    Route::get('/brands/edit/{id}', [BrandController::class, 'edit'])->name('brands.edit');
    Route::put('/brands/edit/{id}', [BrandController::class, 'update'])->name('brands.update');
    Route::delete('/brands/destroy/{id}', [BrandController::class, 'destroy'])->name('brands.destroy');

    // Resource routes for Models
    Route::get('/models', [AssetModelController::class, 'index'])->name('models.index');
    Route::get('/models/create', [AssetModelController::class, 'create'])->name('models.create');
    Route::post('/models/store', [AssetModelController::class, 'store'])->name('models.store');
    Route::get('/models/show/{id}', [AssetModelController::class, 'show'])->name('models.show');
    Route::get('/models/edit/{id}', [AssetModelController::class, 'edit'])->name('models.edit');
    Route::put('/models/edit/{id}', [AssetModelController::class, 'update'])->name('models.update');
    Route::delete('/models/destroy/{id}', [AssetModelController::class, 'destroy'])->name('models.destroy');

    // Resource routes for Profile
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});

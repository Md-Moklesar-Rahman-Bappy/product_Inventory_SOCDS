<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\AssetModelController;
use App\Http\Controllers\ActivityLogController;
use App\Models\ActivityLog;

// 🌐 Public Route
Route::get('/', fn() => view('welcome'));

// 🔐 Authentication Routes
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

// 🔒 Protected Routes
Route::middleware('auth')->group(function () {

    // 📊 Dashboard with Activity Logs
    Route::get('dashboard', function () {
        $logs = ActivityLog::with('user')->latest()->paginate(10);
        return view('dashboard', compact('logs'));
    })->name('dashboard');

    // 📦 Products
    Route::resource('products', ProductController::class);

    // 📁 Categories
    Route::resource('categories', CategoryController::class);
    Route::get('categories/{id}/products', [CategoryController::class, 'products'])->name('categories.products');

    // 🏷️ Brands
    Route::resource('brands', BrandController::class);
    Route::get('brands/{id}/products', [BrandController::class, 'products'])->name('brands.products');

    // 🧩 Models
    Route::resource('models', AssetModelController::class);
    Route::get('models/{id}/products', [AssetModelController::class, 'products'])->name('models.products');

    // 📜 Activity Logs
    Route::get('activity-logs', [ActivityLogController::class, 'index'])->name('activity.logs');

    // 👤 Profile
    Route::get('profile', [AuthController::class, 'profile'])->name('profile');
});

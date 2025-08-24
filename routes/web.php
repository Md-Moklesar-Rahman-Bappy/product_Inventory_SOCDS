<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    ProductController,
    CategoryController,
    BrandController,
    AssetModelController,
    MaintenanceController,
    ActivityLogController
};
use App\Models\{
    ActivityLog,
    Category,
    Brand,
    AssetModel,
    Product,
    Maintenance
};

// 🌐 Public
Route::view('/', 'welcome')->name('home');

// 🔐 Auth
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

// 🔒 Protected
Route::middleware('auth')->group(function () {

    // 📊 Dashboard
    Route::get('dashboard', function () {
        $logs = ActivityLog::with('user')->latest()->paginate(10);

        $entityCounts = [
            'Categories' => Category::count(),
            'Brands'     => Brand::count(),
            'Models'     => AssetModel::count(),
            'Products'   => Product::count(),
        ];

        return view('dashboard', compact('logs', 'entityCounts'));
    })->name('dashboard');

    // 📦 Products
    Route::resource('products', ProductController::class);
    Route::post('products/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');

    // 📁 Categories
    Route::resource('categories', CategoryController::class);
    Route::get('categories/{id}/products', [CategoryController::class, 'products'])->name('categories.products');

    // 🏷️ Brands
    Route::resource('brands', BrandController::class);
    Route::get('brands/{id}/products', [BrandController::class, 'products'])->name('brands.products');

    // 🧩 Models
    Route::resource('models', AssetModelController::class);
    Route::get('models/{id}/products', [AssetModelController::class, 'products'])->name('models.products');

    // 📜 Logs
    Route::get('activity-logs', [ActivityLogController::class, 'index'])->name('activity.logs');

    // 🛠️ Maintenance (Full CRUD)
    Route::resource('maintenance', MaintenanceController::class);

    // 🛡️ Warranties
    Route::get('warranties', [ProductController::class, 'warranties'])->name('warranties.index');

    // 👤 Profile
    Route::get('profile', [AuthController::class, 'profile'])->name('profile');
});

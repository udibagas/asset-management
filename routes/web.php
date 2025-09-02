<?php

use App\Http\Controllers\{
    AssetController,
    CategoryController,
    HomeController,
    LocationController,
    PostController
};

use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home']);
// Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('login', [AuthController::class, 'login'])->name('login.post');
// Route::post('logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
// Route::post('register', [AuthController::class, 'register'])->name('register.post');

Route::middleware('auth')->group(function () {

    Route::middleware('is_admin')->group(function () {
        Route::resources([
            'asset' => AssetController::class,
            'location' => LocationController::class,
            'category' => CategoryController::class,
        ]);
    });

    Route::middleware('role:admin,editor')->group(function () {
        Route::resource('post', PostController::class)->except(['show']);
    });

    Route::delete('asset/{asset}/force', [AssetController::class, 'forceDestroy'])->withTrashed();
    Route::post('asset/{asset}/restore', [AssetController::class, 'restore'])->withTrashed();
});

Route::get('asset/{asset}', [AssetController::class, 'show']);

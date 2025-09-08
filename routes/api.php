<?php

use App\Http\Controllers\Api\AssetController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\LocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::post('/tokens/create', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        // $token = $request->user()->createToken('default', ['*'], now()->addMinutes(1));
        $token = $request->user()->createToken('default');
        return ['token' => $token->plainTextToken];
    }

    return response()->json(['error' => 'Unauthorized'], 401);
});

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/profile', function (Request $request) {
        return $request->user(); // current authenticated user
    });

    Route::delete('/token', function (Request $request) {
        $request->user()->tokens()->delete();
    });

    Route::middleware('is_admin')->group(function () {
        Route::resources([
            'asset' => AssetController::class,
            'location' => LocationController::class,
            'category' => CategoryController::class,
        ]);
    });

    Route::get('/asset', [AssetController::class, 'index']);
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/location', [LocationController::class, 'index']);
});

<?php

use App\Http\Controllers\AssetController;
use App\Models\Asset;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::method(path, handler);

// method = get|post|put|patch|delete
// path = string (/, /about, /contact)
// handler = Closure (callback), Class, [Controller::class, 'method']

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/asset', [AssetController::class, 'index']);
// Route::post('/asset', [AssetController::class, 'store']);
// Route::get('/asset/create', [AssetController::class, 'create']);
// Route::get('/asset/{id}/edit', [AssetController::class, 'edit']);
// Route::put('/asset/{id}', [AssetController::class, 'update']);
// Route::delete('/asset/{id}', [AssetController::class, 'destroy']);

Route::resource('asset', AssetController::class);

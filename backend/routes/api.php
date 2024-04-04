<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::prefix('/api/users')->group(function () {
//     Route::get('/', [App\Http\Controllers\API\UserController::class, 'index']); // List users
//     Route::post('/', [App\Http\Controllers\API\UserController::class, 'store']); // Create user
//     Route::get('/{id}', [App\Http\Controllers\API\UserController::class, 'show']); // Get specific user
//     Route::put('/{id}', [App\Http\Controllers\API\UserController::class, 'update']); // Update user
//     Route::delete('/{id}', [App\Http\Controllers\API\UserController::class, 'destroy']); // Delete user
// });

Route::prefix('/api/users')->resource('users', App\Http\Controllers\API\UserController::class);

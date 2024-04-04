<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('users/index');
// });


Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('users.index'); // List users
Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create'); // Create user
Route::post('/store', [App\Http\Controllers\UserController::class, 'store'])->name('users.store'); // Create user
Route::get('/edit/{user}', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit'); // Create user
Route::put('update/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update'); // Update user
// Route::get('/{id}', [App\Http\Controllers\UserController::class, 'show'])->name(''); // Get specific user
Route::delete('delete/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy'); // Delete user

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

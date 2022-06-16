<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
Route::post('/login', [AuthController::class, 'loginUser'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/list', [UserController::class, 'show'])->name('list');

    Route::get('details/{id}', [UserController::class, 'showDetails'])->name('details');

    Route::get('/register', [UserController::class, 'showRegister'])->name('register.show');
    Route::post('/register', [UserController::class, 'register'])->name('register');

    Route::get('delete/{id}', [UserController::class, 'delete'])->name('delete');


    Route::get('/profile', [UserController::class, 'profile'])->name('profile.show');

    Route::get('/profileEdit', [UserController::class, 'showProfileEdit'])->name('profileEdit.show');
    Route::post('/profileEdit', [UserController::class, 'profileEdit'])->name('profileEdit');

    Route::post('search', [UserController::class, 'search'])->name('search');

});



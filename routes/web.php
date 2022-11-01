<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\RegisterController as UserRegisterController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;

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

Route::view('/', 'index');


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::prefix('user')->name('user.')->group(function () {
    // User Registration
    Route::get('/register', [UserRegisterController::class, 'index'])->name('register');
    Route::post('/register', [UserRegisterController::class, 'register'])->name('register');

    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
});
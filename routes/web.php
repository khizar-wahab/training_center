<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\User\CoursesController as UserCoursesController;
use App\Http\Controllers\User\Auth\LoginController as UserLoginController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\User\Auth\RegisterController as UserRegisterController;
use App\Http\Controllers\User\Auth\ForgotPasswordController as UserForgotPasswordController;

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

Route::get('cmd/{cmd}', function ($cmd) {
    Artisan::call($cmd);
});

Route::view('/', 'index');


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    // Admin Login
    Route::get('', [AdminLoginController:: class, 'index'])->name('login.form');
    Route::post('/login', [AdminLoginController:: class, 'login'])->name('login');
    //Admin Dashboard
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    });
});
// Admin Course Crud
Route::resource('adminCourse', AdminCourseController::class)->middleware(['auth:admin']);

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

Route::prefix('user')->name('user.')->group(function () {
    // User Registration
    Route::get('/register', [UserRegisterController::class, 'index'])->name('register');
    Route::post('/register', [UserRegisterController::class, 'register'])->name('register');

    // User Login
    Route::get('/login', [UserLoginController::class, 'login'])->name('login');
    Route::post('/login', [UserLoginController::class, 'authenticate'])->name('login');

    // User password reset
    Route::get('/forgot-password', [UserForgotPasswordController::class, 'index'])->name('password.request');
    Route::post('/forgot-password', [UserForgotPasswordController::class, 'sendPasswordResetLink'])->name('password.email');
    Route::get('/reset-password/{token}', [UserForgotPasswordController::class, 'resetPassword'])->name('password.reset.form');
    Route::post('/reset-password', [UserForgotPasswordController::class, 'storeNewPassword'])->name('password.reset');

    // User logout
    Route::get('/logout', [UserLoginController::class, 'logout']);

    Route::middleware(['auth:web'])->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
        Route::get('/barcode', [UserDashboardController::class, 'barcode'])->name('barcode');

        Route::get('/courses', [UserCoursesController::class, 'index'])->name('courses');
    });
});

// Testing routes
Route::get('/admin/profile', function(){
    return view('admin.profile');
});
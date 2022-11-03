<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\User\CoursesController as UserCoursesController;
use App\Http\Controllers\User\TicketsController as UserTicketsController;
use App\Http\Controllers\User\JobsController as UserJobsController;
use App\Http\Controllers\User\Auth\LoginController as UserLoginController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\User\Auth\RegisterController as UserRegisterController;
use App\Http\Controllers\User\Auth\ForgotPasswordController as UserForgotPasswordController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

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
    echo "<pre style='color:white;background-color:black;padding:20px;'>";
    return Artisan::output();
});

Route::view('/', 'index')->middleware('guest:web');

Route::get('/details/{code}',[FrontController::class, 'details']);

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    // Admin Login
    Route::middleware('guest:admin')->group(function () {
        Route::get('', [AdminLoginController::class, 'index'])->name('login.form');
        Route::post('/login', [AdminLoginController::class, 'login'])->name('login');
    });

    // Admin logout
    Route::get('/logout', [AdminLoginController::class, 'logout'])->name('logout');
    
    //Admin Dashboard
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        // Admin profile
        Route::get('/profile', [AdminProfileController::class, 'index'])->name('profile');
        Route::post('/profile/update', [AdminProfileController::class, 'update_profile'])->name('profile.update');
    });
});
// Admin Course Crud
Route::resource('adminCourse', AdminCourseController::class)->middleware(['auth:admin']);
// Admin User Crud
Route::resource('adminUser', AdminUserController::class)->middleware(['auth:admin']);


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::prefix('user')->name('user.')->group(function () {
    Route::middleware(['guest:web'])->group(function () {
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
    });

    // User logout
    Route::get('/logout', [UserLoginController::class, 'logout'])->name('logout');

    Route::middleware(['auth:web'])->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
        Route::get('/barcode', [UserDashboardController::class, 'barcode'])->name('barcode');

        Route::get('/courses', [UserCoursesController::class, 'index'])->name('courses');
        Route::post('/courses/{course}/enroll', [UserCoursesController::class, 'enroll'])->name('courses.enroll');
        Route::post('/courses/enroll', [UserCoursesController::class, 'enrollMultiple'])->name('courses.enroll.multiple');

        Route::get('/tickets', [UserTicketsController::class, 'index'])->name('tickets.index');

        Route::get('/jobs', [UserJobsController::class, 'index'])->name('jobs');
    });
});
Route::get('/company',[CompanyController::class,'index'])->name('register-company');
Route::post('/company/register',[CompanyController::class,'register'])->name('company.register');
Route::get('/company/profile',[CompanyController::class,'profile'])->name('company.profile');
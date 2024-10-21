<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;
// use App\Http\Controllers\LoginController;
// use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::get('login', [LoginController::class, 'showUserLoginForm'])->name('login');
// // Route::get('register', [RegisterController::class, 'showUserRegisterForm'])->name('register.index');
Route::post('login/auth', [LoginController::class, 'userLogin'])->name('login.auth');

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/form', function(){
    return view('form');
})->name('form')->middleware('auth');
Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');

Route::get('/class', [ScheduleController::class, 'index'])->name('class');
Route::post('/class/store', [ScheduleController::class, 'store'])->name('class.store');
Route::get('/class/edit/{id}', [ScheduleController::class, 'edit'])->name('class.edit');
Route::post('/class/update/{id}', [ScheduleController::class, 'update'])->name('class.update');
Route::delete('/class/destroy/{id}', [ScheduleController::class, 'destroy'])->name('class.destroy');
Route::get('/class/submit/{id}', [ScheduleController::class, 'submit'])->name('submit');

Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::post('/update-status', [SearchController::class, 'updateStatus'])->name('update-status');

// Route::get('/login', [LoginController::class, 'index'])->name('login');
// Route::post('/login', [LoginController::class, 'login']);
// Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::get('/register', [RegisterController::class, 'index'])->name('register');
// Route::post('/register', [RegisterController::class, 'register']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

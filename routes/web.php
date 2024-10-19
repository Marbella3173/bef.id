<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\EventController;


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

Route::get('/', function () {
    return view('home');
});

Route::get('/class', [ScheduleController::class, 'index'])->name('class');
Route::post('/class/store', [ScheduleController::class, 'store'])->name('class.store');
Route::get('/class/edit/{id}', [ScheduleController::class, 'edit'])->name('class.edit');
Route::post('/class/update/{id}', [ScheduleController::class, 'update'])->name('class.update');
Route::delete('/calendar/destroy/{id}', [ScheduleController::class, 'destroy'])->name('class.destroy');



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
Route::get('/calendar', [EventController::class, 'index'])->name('calendar.index');
Route::post('/calendar/store', [EventController::class, 'store'])->name('calendar.store');
Route::get('/calendar/edit/{id}', [EventController::class, 'edit'])->name('calendar.edit');
Route::post('/calendar/update/{id}', [EventController::class, 'update'])->name('calendar.update');
Route::delete('/calendar/destroy/{id}', [EventController::class, 'destroy'])->name('calendar.destroy');

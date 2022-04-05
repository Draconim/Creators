<?php

use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});

Route::get('/qr', function () {
    return view('qr');
});
Route::resource('events','App\Http\Controllers\EventController');

Route::get('/events', [EventController::class, 'index'])->name('eventlist');
Route::get('/events/{id}', [EventController::class, 'show'])->name('details_event');
Route::get('/events/create', [EventController::class, 'store'])->name('create_event');
Route::get('/events/{id}/update', [EventController::class, 'update'])->name('update_event');
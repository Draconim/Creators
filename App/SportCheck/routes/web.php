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
Route::resource('events','App\Http\Controllers\EventController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/hallgato',function(){
    return view('register');
});
Route::get('/dolgozo',function(){
    return view('register');
});
Route::get('/vendeg',function(){
    return view('register');
});
Route::get('/events', [EventController::class, 'index'])->name('eventlist');
Route::get('/events/{id}', [EventController::class, 'show'])->name('details_event');
Route::get('/events/create', [EventController::class, 'store'])->name('create_event');
Route::get('/events/{id}/update', [EventController::class, 'update'])->name('update_event');

//Route::get('/events', [EventController::class, 'events'])->name('events');
Route::get('/details', [EventController::class, 'details'])->name('details');
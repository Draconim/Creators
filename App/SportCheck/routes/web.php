<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Event_User_StatusController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

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
    return view('auth.login');
});
//Route::resource('events','App\Http\Controllers\EventController');

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

Route::get('/events', [EventController::class, 'events'])->name('events');
Route::get('/events/{id}', [EventController::class, 'details'])->name('details');
Route::post('/events/{id}', [Event_User_StatusController::class, 'store']);
Route::get('/create', [EventController::class, 'create'])->name('create_event');
Route::post('/create', [EventController::class, 'store']);
//Route::get('/events', [EventController::class, 'index'])->name('eventlist');
//Route::get('/events/{id}', [EventController::class, 'show'])->name('details_event');
Route::get('/events/{id}/update', [EventController::class, 'update'])->name('update_event');



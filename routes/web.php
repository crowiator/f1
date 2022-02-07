<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\PostControllerController;
use App\Http\Controllers\DriverController;

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
//Route::get(' events/create',[EventController::class, 'create'])->middleware('can:isAdmin')->name(' events.create');
//Route::get(' events/create',[EventController::class, 'create'])->middleware('can:isPub')->name(' events.create');
Route::get('drivers/standings', [App\Http\Controllers\DriverController::class, 'standings'])->name('drivers.standings');
Route::resource('events', EventController::class);
Route::resource('posts', \App\Http\Controllers\PostController::class);
Route::resource('comments', \App\Http\Controllers\CommentController::class);
Route::resource('teams', \App\Http\Controllers\TeamController::class);
Route::resource('drivers', \App\Http\Controllers\DriverController::class);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\PostController::class, 'index'])->name('index');



Route::get('races',[RaceController::class,'index']);
Route::get('racesforUser',[RaceController::class,'indexForUser']);
Route::get('fetch-races',[RaceController::class,'fetchrace']);
Route::post('races',[RaceController::class,'store']);
Route::get ('edit-race/{id}',[RaceController::class,'edit']);
Route::put('update-race/{id}',[RaceController::class,'update']);
Route::delete('delete-race/{id}',[RaceController::class,'destroy']);






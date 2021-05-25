<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

//Route::view('/','welcome');
Route::get('/',[UserController::class,'showUsers'])->name('user.list');
Route::post('/country/save',[UserController::class,'saveCountry'])->name('save-country');
Route::get('/user/create',[UserController::class,'createUser'])->name('user.create');
Route::post('/user/create',[UserController::class,'saveUser']);
Route::get('/user/edit/{id}',[UserController::class,'getUser'])->name('user.edit');
Route::put('/user/edit/{id}',[UserController::class,'saveUser'])->name('user.update');
Route::get('/user/delete/{id}',[UserController::class,'deleteUser'])->name('user.delete');

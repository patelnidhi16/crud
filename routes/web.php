<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


Route::get('showform',[UserController::class,'showForm'])->name('showform');
Route::post('store',[UserController::class,'store'])->name('store');
Route::post('delete',[UserController::class,'delete'])->name('delete');
Route::post('edit',[UserController::class,'edit'])->name('edit');
Route::post('update',[UserController::class,'update'])->name('update');
Route::get('search',[UserController::class,'search'])->name('search');
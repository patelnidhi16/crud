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
Route::get('restore/{id}',[UserController::class,'restore'])->name('restore');
Route::get('final_delete/{id}',[UserController::class,'final_delete'])->name('final_delete');
Route::post('edit',[UserController::class,'edit'])->name('edit');
Route::put('update',[UserController::class,'update'])->name('update');
Route::get('search',[UserController::class,'search'])->name('search');
Route::get('/trash',[UserController::class,'trash'])->name('trash');
Route::get('/count_comment',[UserController::class,'count_comment'])->name('count_comment');
Route::get('/abc',[UserController::class,'abc'])->name('abc');
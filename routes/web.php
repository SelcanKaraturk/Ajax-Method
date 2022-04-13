<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PersonController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('list',[BlogController::class,'create']);
Route::get('blog',[BlogController::class,'store'])->name('blog');
Route::post('blog',[BlogController::class,'storePost'])->name('blogPost');
Route::get('person',[PersonController::class,'index'])->name('person');
Route::get('person2',[PersonController::class,'table'])->name('table');
Route::post('addPerson',[PersonController::class,'addPerson'])->name('addPerson');

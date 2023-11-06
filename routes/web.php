<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::resource('levels', \App\Http\Controllers\LevelController::class);
Route::resource('categories' , \App\Http\Controllers\CategoryController::class);
Route::resource('courses' , \App\Http\Controllers\CourseController::class);


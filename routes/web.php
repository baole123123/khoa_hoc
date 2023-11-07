<?php

use App\Http\Controllers\CategoryController;
use App\Models\Course;

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
Route::resource('courses' , \App\Http\Controllers\CourseController::class);
Route::resource('members' , \App\Http\Controllers\MemberController::class);
Route::resource('categories' , \App\Http\Controllers\CategoryController::class);
Route::resource('users' , \App\Http\Controllers\UserController::class);

Route::put('categorie/softdeletes/{id}', [CategoryController::class, 'softdeletes'])->name('categorie.softdeletes');
Route::get('categorie/trash', [CategoryController::class, 'trash'])->name('categorie.trash');
Route::put('categorie/restoredelete/{id}', [CategoryController::class, 'restoredelete'])->name('categorie.restoredelete');
Route::get('categorie/destroy/{id}', [CategoryController::class, 'destroy'])->name('categorie_destroy');

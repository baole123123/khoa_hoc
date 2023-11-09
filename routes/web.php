<?php

use App\Models\Course;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
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
Route::get('/login-admin', [AuthController::class, 'login'])->name('login');
Route::post('/checklogin', [AuthController::class, 'checklogin'])->name('checklogin');
Route::get('/admin-register', [AuthController::class, 'register'])->name('register');
Route::post('/store-register', [AuthController::class, 'store_register'])->name('store_register');
Route::get('/change-password', [\App\Http\Controllers\Auth\ChangePasswordController::class, 'showChangePasswordForm'])->name('changePassword');
Route::post('/change-password', [\App\Http\Controllers\Auth\ChangePasswordController::class, 'changePassword'])->name('changePassword.submit');
Route::prefix('/')->middleware(['auth.check'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/members/profile/{id}', [\App\Http\Controllers\MemberController::class, 'showProfile'])->name('members.profile');
    Route::resource('levels', \App\Http\Controllers\LevelController::class);
    Route::resource('courses', \App\Http\Controllers\CourseController::class);
    Route::resource('members', \App\Http\Controllers\MemberController::class);
    Route::resource('chapters', \App\Http\Controllers\ChapterController::class);
    Route::resource('lessons', \App\Http\Controllers\LessonContrller::class);
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::put('categorie/softdeletes/{id}', [CategoryController::class, 'softdeletes'])->name('categorie.softdeletes');
    Route::get('categorie/trash', [CategoryController::class, 'trash'])->name('categorie.trash');
    Route::put('categorie/restoredelete/{id}', [CategoryController::class, 'restoredelete'])->name('categorie.restoredelete');
    Route::get('categorie/destroy/{id}', [CategoryController::class, 'destroy'])->name('categorie_destroy');
});

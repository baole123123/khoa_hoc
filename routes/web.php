<?php

use App\Models\Course;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\CourseController;

use App\Http\Controllers\AuthShopController;

use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



Auth::routes();

// Route::get('/', function () {
//     return view('shop.home');
// });
Route::get('/a', function () {
    return view('shop.show');
});
//// shop
Route::get('shop/home', [ShopController::class, 'index'])->name('shop.home');
Route::get('shop/detail/{id}', [ShopController::class, 'detail'])->name('shop.detail');
Route::get('shop/show/{id}', [ShopController::class, 'show'])->name('shop.show');
// Route::get('admin/courses/{id}', [CourseController::class, 'show'])->name('admin.courses.show');



    return view('index');
});
Route::get('/login-shop', [AuthShopController::class, 'login'])->name('login-shop');
Route::post('/checkloginShop', [AuthShopController::class, 'checkloginShop'])->name('checkloginShop');
Route::get('/shop-register', [AuthShopController::class, 'register'])->name('registerShop');
Route::post('/store-register', [AuthShopController::class, 'store_register'])->name('store_register');
Route::get('shop/home', [ShopController::class, 'index'])->name('shop.home');

Route::get('/login-admin', [AuthController::class, 'login'])->name('login');
Route::post('/checklogin', [AuthController::class, 'checklogin'])->name('checklogin');
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
Route::post('/add-to-cart/{id}', [ShopController::class, 'addToCart'])->name('addToCart');
Route::get('/shop/home/cart', [ShopController::class, 'homeCart'])->name('cart');
Route::delete('/cart/destroy/{id}', [ShopController::class, 'cartDestroy'])->name('destroy-cart');

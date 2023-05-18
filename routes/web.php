<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DishController;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\Auth2\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Adm\RoleController;
use App\Http\Controllers\Adm\UserController;
use App\Http\Controllers\Adm\CategoryController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;




Route::get('/', function () {
    return redirect()->route('dishes.index');
});
Route::get('lang/{lang}', [LangController::class, 'switchLang']) ->name('switch.lang');
Route::prefix('adm')->as('adm.')->middleware('hasrole:admin,moderator')->group(function (){

    Route::resource('/roles', RoleController::class);
    Route::resource('/category', CategoryController::class);
    Route::get('/cart',[UserController::class, 'cart'])->name('cart');
    Route::put('/cart{cart}/confirm', [DishController::class, 'confirm'])->name('cart.confirm');
    Route::resource('/dishes', DishController::class)->except('index', 'show');
    Route::get('/dishes/product', [DishController::class, 'product'])->name('dishes.product');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/shops/search', [DishController::class, 'product'])->name('dishes.search');
    Route::get('/users/search', [UserController::class, 'index'])->name('users.search');
    Route::get('/users/search', [UserController::class, 'index'])->name('users.search');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::put('/users/{user}/ban', [UserController::class, 'ban'])->name('users.ban');
    Route::put('/users/{user}/unban', [UserController::class, 'unban'])->name('users.unban');
});
Route::middleware('auth')->group(function (){
    Route::resource('/dishes', DishController::class)->except('index', 'show');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('/comments', CommentController::class)->only('store', 'destroy');
    Route::get('/profile/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/profile{profile}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/{profile}', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('posts', DishController::class)->except(['index', 'show']);
    Route::post('/dishes/{dish}/rate', [DishController::class, 'rateDish'])->name('rateDish');
    Route::post('/dishes/{dish}/unrate', [DishController::class, 'unrateDish'])->name('unrateDish');
    Route::post('/cart/{dish}/putToCart', [CartController::class, 'putToCart'])->name('dishes.cart');
    Route::post('/cart/{dish}/deleteFromCart', [CartController::class, 'deleteFromCart'])->name('dishes.delete');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'buy'])->name('cart.buy');

    Route::get('/pays', [PayController::class, 'index'])->name('pay.index');
    Route::get('/pays/create', [PayController::class, 'create'])->name('pay.create');
    Route::post('/pays/{paycheck}', [PayController::class, 'store'])->name('pay.store');
    Route::get('/pays/{paycheck}/edit', [PayController::class, 'edit'])->name('pay.edit');
    Route::put('/pays/{paycheck}', [PayController::class, 'update'])->name('pay.update');
    Route::delete('/pays/{paycheck}', [PayController::class, 'destroy'])->name('pay.destroy');
});
    Route::resource('/dishes', DishController::class)->only('index', 'show');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dishes/category/{category}', [DishController::class, 'dishCategory'])->name('dishes.category');
    Route::get('/register', [RegisterController::class, 'create'])->name('register.form');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
    Route::get('/login', [LoginController::class, 'create'])->name('login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');





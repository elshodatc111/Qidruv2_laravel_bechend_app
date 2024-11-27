<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/new_post', [HomeController::class, 'new_post'])->name('new_post');
Route::get('/home_show/{id}', [HomeController::class, 'home_show'])->name('home_show');
Route::get('/home_show_update/{id}', [HomeController::class, 'home_show_update'])->name('home_show_update');
Route::put('/home_show_update_post/{id}', [HomeController::class, 'home_show_update_post'])->name('home_show_update_post');
Route::put('/updates_images/{id}', [HomeController::class, 'updates_images'])->name('updates_images');
Route::post('/new_post_create', [HomeController::class, 'new_post_create'])->name('new_post_create');

Route::get('/users', [HomeController::class, 'users'])->name('users');
Route::get('/user_create', [HomeController::class, 'user_create'])->name('user_create');
Route::post('/user_create_post', [HomeController::class, 'user_create_post'])->name('user_create_post');
Route::delete('/user_delete/{id}', [HomeController::class, 'user_delete'])->name('user_delete');

Route::get('/setting', [SettingController::class, 'setting'])->name('setting');
Route::delete('/setting_delete/{id}', [SettingController::class, 'setting_delete'])->name('setting_delete');
Route::post('/setting_create_rigion', [SettingController::class, 'setting_create_rigion'])->name('setting_create_rigion');
Route::post('/setting_create_toifa', [SettingController::class, 'setting_create_toifa'])->name('setting_create_toifa');
Route::post('/setting_create_typing', [SettingController::class, 'setting_create_typing'])->name('setting_create_typing');

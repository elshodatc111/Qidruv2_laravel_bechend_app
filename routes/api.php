<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [ApiController::class, 'login']);

Route::middleware('auth:sanctum')->get('/home', [ApiController::class, 'home']);


Route::middleware('auth:sanctum')->get('/show/{id}', [ApiController::class, 'show']);
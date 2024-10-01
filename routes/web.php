<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TechnologyController;

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('/home', [TechnologyController::class, 'index'])->name('home');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/login', [AuthController::class, 'login'])->name('user.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');

Route::resource('technologies', TechnologyController::class);
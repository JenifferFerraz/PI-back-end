<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\PerguntaController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureAuthenticated;

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('user.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');

// Protecting routes with custom auth middleware
Route::middleware([EnsureAuthenticated::class])->group(function () {
    Route::get('/home', [TechnologyController::class, 'index'])->name('home');

    Route::get('/perguntas', function () {
        return view('perguntas');
    })->name('perguntas');

    Route::get('/perfil', [UserController::class, 'edit'])->name('perfil');
    Route::put('/atualizar/{id}', [UserController::class, 'update'])->name('user.update');
    Route::resource('technologies', TechnologyController::class);
});
<?php

use App\Http\Controllers\{
    AuthController,
    TechnologyController, 
    UserController
};
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/cadastrar', [UserController::class, 'store'])->name('user.store');

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::prefix('/user')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::put('/atualizar/{id}', [UserController::class, 'update']);
        Route::delete('/deletar/{id}', [UserController::class, 'destroy']);
        Route::get('/visualizar/{id}', [UserController::class, 'show']);
    });
});

Route::get('/technology', [TechnologyController::class, 'index']);
Route::post('/technology/cadastrar', [TechnologyController::class, 'store']);
Route::put('/technology/atualizar/{id}', [TechnologyController::class, 'update']);
Route::delete('/technology/deletar/{id}', [TechnologyController::class, 'destroy']);
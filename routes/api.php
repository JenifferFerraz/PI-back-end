<?php

use App\Http\Controllers\{
    AuthController,
    TechnologyController, 
    UserController,
    PerguntaController
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


Route::get('/perguntas', [PerguntaController::class, 'index'])->name('perguntas.index');
Route::get('/perguntas/{id}', [PerguntaController::class, 'show'])->name('perguntas.show');
Route::post('/perguntas', [PerguntaController::class, 'store'])->name('perguntas.store');
Route::put('/perguntas/{id}', [PerguntaController::class, 'update'])->name('perguntas.update');
Route::delete('/perguntas/{id}', [PerguntaController::class, 'destroy'])->name('perguntas.destroy');

Route::get('/perguntas/{id}/opcoes', [PerguntaController::class, 'getOptions'])->name('perguntas.options');
Route::post('/opcoes', [PerguntaController::class, 'storeOption'])->name('opcoes.store');
Route::put('/opcoes/{id}', [PerguntaController::class, 'updateOption'])->name('opcoes.update');
Route::delete('/opcoes/{id}', [PerguntaController::class, 'destroyOption'])->name('opcoes.destroy');
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\EventosController;

// Rotas da versão 1 da API
Route::prefix('v1')->group(function(){
    // Rotas para usuários
    Route::get('users', [UserController::class, 'index']);
    Route::post('users', [UserController::class, 'store']);
    Route::get('users/{id}', [UserController::class, 'show']);
    Route::put('users/{id}', [UserController::class, 'update']);
    Route::delete('users/{id}', [UserController::class, 'destroy']);
    
    // Rotas para eventos
    Route::get('eventos', [EventosController::class, 'index']);
    Route::post('eventos', [EventosController::class, 'store']);
    Route::get('eventos/{id}', [EventosController::class, 'show']);
    Route::put('eventos/{id}', [EventosController::class, 'update']);
    Route::delete('eventos/{id}', [EventosController::class, 'destroy']);
});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\EventosController;

Route::prefix('v1')->group(function(){
    Route::get('users', [UserController::class, 'index']);
    Route::get('eventos', [EventosController::class, 'index']);
});

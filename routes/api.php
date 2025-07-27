<?php

use App\Http\Controllers\Api\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TransacoesController;

Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('transacoes', TransacoesController::class);
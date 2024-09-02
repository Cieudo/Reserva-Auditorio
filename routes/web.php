<?php

use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

// Rota inicial redireciona para a listagem de equipamentos
Route::get('/', function () {
    return view('inicial.index'); // Caminho para o seu arquivo index.blade.php
})->name('home');


// Rotas para Login e Logout
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Rotas para Equipamentos


// Rotas para Reservas
Route::middleware(['auth'])->group(function () {
    Route::get('/equipamentos', [EquipamentoController::class, 'index'])->name('equipamentos.index');
    Route::get('/equipamentos/create', [EquipamentoController::class, 'create'])->name('equipamentos.create');
    Route::post('/equipamentos', [EquipamentoController::class, 'store'])->name('equipamentos.store');
    Route::get('/equipamentos/{id}/edit', [EquipamentoController::class, 'edit'])->name('equipamentos.edit');
    Route::put('/equipamentos/{id}', [EquipamentoController::class, 'update'])->name('equipamentos.update');
    Route::delete('/equipamentos/{id}', [EquipamentoController::class, 'destroy'])->name('equipamentos.destroy');
    
    Route::get('/reservas', [ReservaController::class, 'index'])->name('reservas.index');
    Route::get('/reservas/create', [ReservaController::class, 'create'])->name('reservas.create');
    Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');
    Route::get('/reservas/{id}/edit', [ReservaController::class, 'edit'])->name('reservas.edit');
    Route::put('/reservas/{id}', [ReservaController::class, 'update'])->name('reservas.update');
    Route::delete('/reservas/{id}', [ReservaController::class, 'destroy'])->name('reservas.destroy');
});

// Rotas para Usuários
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

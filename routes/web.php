<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'testeUsuario'])->name('login.teste-usuario');

Route::get('/main', [UsuarioController::class, 'index'])->name('main-page');
Route::post('/main/inserir', [UsuarioController::class, 'store'])->name('main-page.adicionar');
Route::get('/main/editar/{usuario}', [UsuarioController::class, 'edit'])->name('main-page.editar');
Route::patch('/main/atualizar/{usuario}', [UsuarioController::class, 'update'])->name('main-page.atualizar');
Route::get('/main/deletar/{usuario}', [UsuarioController::class, 'destroy'])->name('main-page.deletar');


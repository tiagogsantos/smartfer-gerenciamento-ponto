<?php

use App\Http\Controllers\Administrativo\AdministrativoController;
use App\Http\Controllers\Administrativo\AtestadoController;
use App\Http\Controllers\Administrativo\FuncionariosController;
use App\Http\Controllers\Web\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

Route::group(['as' => 'web.'], function () {

    Route::post('login', [AuthController::class, 'login'])->name('login.do');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('/administrativo')->name('admin.')->namespace('Administrativo')->group(function () {

    Route::middleware(['auth:sanctum'])->group(function () {

        Route::post('update-atestados/{id}', [AtestadoController::class, 'UpdateAtestado'])->name('updateaestados');

        Route::post('store-atestados', [AtestadoController::class, 'storeAtestado'])->name('storeaestados');

        Route::get('criar-atestados', [AtestadoController::class, 'createAtestado'])->name('createaestados');

        Route::get('lista-atestados/{id}/{user_id}', [AtestadoController::class, 'editAtestado'])->name('editaestados');

        Route::get('lista-atestados', [AtestadoController::class, 'getListAtestados'])->name('getListAtestados');

        Route::post('atualizar-funcionario/{id}', [FuncionariosController::class, 'atualizarFuncionario'])->name('atualizarfuncionario');

        Route::post('excluir-funcionario/{id}', [FuncionariosController::class, 'excluirFuncionario'])->name('excluirfuncionario');

        Route::get('editar-funcionario/{id}', [FuncionariosController::class, 'editFuncionario'])->name('editarfuncionario');

        Route::get('lista-usuarios', [AdministrativoController::class, 'getListUsers'])->name('getListUsers');

        Route::get('/', [AdministrativoController::class, 'index'])->name('index');
    });
});



<?php

use App\Http\Controllers\Administrativo\AdministrativoController;
use App\Http\Controllers\Administrativo\AtestadoController;
use App\Http\Controllers\Administrativo\FuncionariosController;
use Illuminate\Support\Facades\Route;


Route::prefix('/administrativo')->name('admin.')->namespace('Administrativo')->group(function () {

    Route::get('criar-atestados', [AtestadoController::class, 'createAtestado'])->name('createaestados');

    Route::get('lista-atestados/{id}/{user_id}', [AtestadoController::class, 'editAtestado'])->name('editaestados');

    Route::get('lista-atestados', [AtestadoController::class, 'getListAtestados'])->name('getListAtestados');

    Route::post('atualizar-funcionario/{id}', [FuncionariosController::class, 'atualizarFuncionario'])->name('atualizarfuncionario');

    Route::post('excluir-funcionario/{id}', [FuncionariosController::class, 'excluirFuncionario'])->name('excluirfuncionario');

    Route::get('editar-funcionario/{id}', [FuncionariosController::class, 'editFuncionario'])->name('editarfuncionario');

    Route::get('lista-usuarios', [AdministrativoController::class, 'getListUsers'])->name('getListUsers');

    Route::get('/', [AdministrativoController::class, 'index'])->name('index');

});



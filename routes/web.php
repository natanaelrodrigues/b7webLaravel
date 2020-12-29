<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefasController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'index']);

Route::prefix('/tarefas')->group(function(){
    Route::get('/',  [TarefasController::class, 'list'])->name('tarefas.list');  // listagem das tarefas
    Route::get('add',[TarefasController::class, 'add'])->name('tarefas.add'); // Tela de inclusão de nova tarefa
    Route::post('add',[TarefasController::class, 'addAction']); // Ação de inclusão da tarefa
    Route::get('edit/{id}',[TarefasController::class, 'edit'])->name('tarefas.edit'); // Tela de edição
    Route::post('edit/{id}',[TarefasController::class, 'editAction']);// Ação de edição das tarefas
    Route::get('delete/{id}',[TarefasController::class, 'del'])->name('tarefas.del'); // Ação de deleção da Tarefa
    Route::get('marcar/{id}',[TarefasController::class, 'done'])->name('tarefas.done');  // MArcar resolvido ou nao resolvido
});
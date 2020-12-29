<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;

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

Route::resource('todo',TodoController::class);
// Rotas do resource
/*
    GET - /todo           - index   - todo.index   - LISTA OS ITENS
    GET - /todo/create    - create  - todo.create  - FORM DE CRIAÇÃO
    POST - /todo          - store   - todo.store   - RECEBER OS DADOS E ADD ITEM
    GET - /todo/{id}      - show    - todo.show    - ITEM INDIVIDUAL
    GET - /todo/{id}/edit - edit    - todo.edit    - FORM DE EDIÇÃO
    PUT - /todo/{id}      - update  - todo.update  - RECEBER OS DADOS E UPDATE ITEM
    DELETE - /todo/{id}   - destroy - todo.destroy - DELETAR O ITEM
*/
//fim rotas do resource

Route::prefix('/tarefas')->group(function(){
    Route::get('/',  [TarefasController::class, 'list'])->name('tarefas.list');  // listagem das tarefas
    Route::get('add',[TarefasController::class, 'add'])->name('tarefas.add'); // Tela de inclusão de nova tarefa
    Route::post('add',[TarefasController::class, 'addAction']); // Ação de inclusão da tarefa
    Route::get('edit/{id}',[TarefasController::class, 'edit'])->name('tarefas.edit'); // Tela de edição
    Route::post('edit/{id}',[TarefasController::class, 'editAction']);// Ação de edição das tarefas
    Route::get('delete/{id}',[TarefasController::class, 'del'])->name('tarefas.del'); // Ação de deleção da Tarefa
    Route::get('marcar/{id}',[TarefasController::class, 'done'])->name('tarefas.done');  // MArcar resolvido ou nao resolvido
});
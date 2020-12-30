<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Suport\Facedes\Gate;

use App\Models\Tarefa;

class TarefasController extends Controller
{

    public function __construct(){
        $this->middleware('auth');

        if (!Gate::allow('isActive')){
            redirect.rote('login');
        }
    }

    public function list(Request $request){
        // PERMISSÕES QUE SÃO DEFINIDAS No AuthServiceProvaider.php
        if (!Gate::allow('isAdmin')){
            echo 'Usuario Administrador';
        } else {
            echo 'Este Usuário não possui perfil de Administrador';
        };

        // SESSÃO
        /*
            Grava a sessão
            intval converte para interiro.
        */
        $tries = intval($request->session()->get('passagem',0)); 
        $request->session()->put('passagem',++$tries);
        /*
            @pega a sessão
            @param1 - Nome da variavel na sessão
            @param2 - valor Padrão
        */
        $tries = $request->session()->get('passagem',0); 
        // apagar uma sessão
        //$request->session()->forget('passagem');
        // ORM
        $list = Tarefa::all();

        return view('tarefas.list',[
            'list' => $list
        ]);
    }

    public function add(){
        return view('tarefas.add');
    }

    public function addAction(Request $request){

        $request->validate([
            'title' => [ 'required', 'string' ]
        ]);

        $title = $request->input('title');

        $tarefa = new Tarefa();
        $tarefa->titulo =  $title;
        $tarefa->save();

        return redirect()->route('tarefas.list');

    }

    public function edit($id){
        $tarefa = Tarefa::find($id);

        if( $tarefa ){
            return view('tarefas.edit',[
                'data' => $tarefa
            ]);
        } else {
            return redirect()->route('tarefas.list');
        }
    }

    public function editAction(Request $request, $id){

        $request->validate([
            'title' => [ 'required', 'string' ]
        ]);

        $data = Tarefa::find($id);

        if( $data ){
            $titulo = $request->input('title');
            $data->titulo =  $titulo;
            $data->save();
        } 

        return redirect()->route('tarefas.list');
    }

    public function del($id){
        Tarefa::find($id)->delete();
        return redirect()->route('tarefas.list');
    }

    public function done($id){
        $tarefa = Tarefa::find($id);

        if( $tarefa ) {
            $tarefa->resolvido = 1-$tarefa->resolvido;
            $tarefa->save();
        }
                
        return redirect()->route('tarefas.list');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TarefasController extends Controller
{
    public function list(){
        $list = DB::select('SELECT * FROM tarefas');
        return view('tarefas.list',[
            'list' => $list
        ]);
    }

    public function add(){
        return view('tarefas.add');
    }

    public function addAction(Request $request){
        
        if($request->filled('title')){

            $title = $request->input('title');

            DB::insert('INSERT INTO TAREFAS(titulo) values (:titulo)',[
                'titulo'=> $title
            ]);

            return redirect()->route('tarefas.list');

        } else {
            return redirect()->route('tarefas.add')
                             ->with('warning','Você não informou o titulo da tarefa');
        }

    }

    public function edit($id){
  
        $data = DB::select('SELECT * FROM TAREFAS WHERE ID = :id',[
            'id' => $id
        ]);

        if(count($data) > 0){
            return view('tarefas.edit',[
                'data' => $data[0]
            ]);
        } else {
            return redirect()->route('tarefas.list');
        }

        
    }

    public function editAction(Request $request, $id){
        if($request->filled('title')){


            $data = DB::select('SELECT * FROM TAREFAS WHERE ID = :id',[
                'id' => $id
            ]);
    
            if(count($data) > 0){
                $titulo = $request->input('title');
                DB::update('UPDATE TAREFAS SET titulo = :titulo WHERE id = :id',[
                    'id' => $id,
                    'titulo' => $titulo
                ]);
            } 
            return redirect()->route('tarefas.list');
        } else {
            return redirect()->route('tarefas.edit',['id'=>$id])
                             ->with('warning','Você não informou o titulo da tarefa');
        } 
    }

    public function del(){
        
    }

    public function done(){
        
    }
}

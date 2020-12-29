<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tarefa;

class HomeController extends Controller
{
    public function __invoke(){
        // Busca todos os registros
        //$list = Tarefa::all();

        // busca um filtro específico
       // $list = [];//Tarefa::where('resolvido',0);

        //foreach($list as $item){
       //     echo $item->titulo."<br/>";
       // }
        //return view('welcome');
    }

    public function index(){
        // Busca todos os registros
        //$list = Tarefa::all();

        // inclusão de um item.
        $t = new Tarefa;
        $t->titulo = 'Adicionado pelo Eloquent ORM - '. random_int(0,1001);
        $t->save();
        // fim de inclusão

        //editando um item
        $t = Tarefa::find(4);
        $t->titulo = $t->titulo . random_int(0,1001);
        $t->save();
        // fim de editar



        // busca o primeiro item
        $primeiroItem = Tarefa::where('resolvido',0)->first();
        echo "<h1>Primeiro Item: ".$primeiroItem->titulo."<br/></h1>";

        // busca um filtro específico
        $list = Tarefa::where('resolvido',0)->get();
        
        foreach($list as $item){
            echo $item->titulo."<br/>";
        }

        $total = Tarefa::count();

        echo "Total de Registros:".$total;

        //atualiza vários
        // Tarefa::where()->update();

        // deleta vários
        // Tarefa::where()->delete();
    }
}

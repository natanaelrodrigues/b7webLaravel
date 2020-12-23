@extends('layouts.admin')

@section('title','Listagem de tarefas')

@section('content')
    <h1>listagem </h1>

    <a href="">[ Adicionar nova Tarefa ]</a>

    @if(count($list) > 0)
        <ul>
            @foreach($list as $item)
                <li>
                    <a href="">[ @if($item->resolvido===1) Desmarcar @else Marcar @endif]</a>
                    {{$item->titulo}}
                    <a href="">[ Editar ]</a>
                    <a href="">[ Excluir ]</a>
                </li>
            @endforeach
        </ul>
    @else 
        Não há itens  serem listados.
    @endif
@endsection
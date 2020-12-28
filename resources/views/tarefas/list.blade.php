@extends('layouts.admin')

@section('title','Listagem de tarefas')

@section('content')
    <h1>listagem </h1>

    <a href="{{ route('tarefas.add')  }}">[ Adicionar nova Tarefa ]</a>

    @if(count($list) > 0)
        <ul>
            @foreach($list as $item)
                <li>
                    <a href="{{ route('tarefas.done',['id'=>$item->id]) }}">[ @if($item->resolvido===1) Desmarcar @else Marcar @endif]</a>
                    {{$item->titulo}}
                    <a href="{{ route('tarefas.edit',['id'=>$item->id]) }}">[ Editar ]</a>
                    <a href="{{ route('tarefas.del',['id'=>$item->id]) }}">[ Excluir ]</a>
                </li>
            @endforeach
        </ul>
    @else 
        <br> Não há itens  serem listados.
    @endif
@endsection
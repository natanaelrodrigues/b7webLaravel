@extends('layouts.admin')

@section('title','Edição de tarefas')

@section('content')
    <h1>Edição </h1>

    {{-- forma antiga de apresentar mensagem de erro - Flash
     @if(session('warning'))
        <h3>{{session('warning')}}</h3>
    @endif
    --}}

    @if($errors->any())
        @foreach($errors->all() as $error) 
            <h5>{{$error}}</h5> <br>
        @endforeach
    @endif

    <form method="post">
        @csrf

        <label >
            Titulo:<br>
            <input type="text" name="title" value="{{$data->titulo}}">
        </label>
   
        <input type="submit" value="Salvar"/>
    </form>
@endsection
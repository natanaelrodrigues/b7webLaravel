@extends('layouts.admin')

@section('title','Adição de tarefas')

@section('content')
    <h1>Adição </h1>

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
            <input type="text" name="title">
        </label>
   
        <input type="submit" value="adicionar"/>
    </form>
@endsection
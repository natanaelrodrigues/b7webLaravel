@extends('layouts.admin')

@section('title','Adição de tarefas')

@section('content')
    <h1>Adição </h1>

    @if(session('warning'))
        <h3>{{session('warning')}}</h3>
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
@extends('Partials.app')

@section('content')
        
    <h1> Detalhes da Cliente </h1>
    
    <ul>
        <li>{{ $cliente->id }}</li>
        <li>{{ $cliente->nome }}</li>
        <li>{{ $cliente->dtnascimento }}</li>
    </ul>

    <form action="{{ route('cliente.destroy', $cliente->id) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit"> Deletar cliente: {{$cliente->nome}}</button>
    </form>

@endsection
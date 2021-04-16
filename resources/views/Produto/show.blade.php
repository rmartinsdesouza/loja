@extends('Partials.app')

@section('content')
        
    <h1> Detalhes da Produto </h1>
    
    <ul>
        <li>{{ $produto->id }}</li>
        <li>{{ $produto->nome }}</li>
        <li>{{ $produto->dtnascimento }}</li>
    </ul>

    <form action="{{ route('produto.destroy', $produto->id) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit"> Deletar produto: {{$produto->nome}}</button>
    </form>

@endsection
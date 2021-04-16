@extends('Partials.app')

@section('title',  'Listagem das Produtos')

@section('content')

    <a href="{{ route('produto.create') }}"> Criar Novo Cliente</a>
    <hr>

    @if(session('message'))
        <div>
            {{ session('message') }}
        </div>    
    @endif

    <form action="{{ route('produto.search') }}" method="post">
        @csrf
        <input type="text" name="search" placeholder="Filtrar:">
        <button type="submit">Filtrar</button>

    @foreach($produto as $key => $cli)
        <p>
            
            {{ $cli->id }}
            {{ $cli->nome }}
            {{ $cli->dtnascimento }}
            [
                <a href="{{ route('produto.show', $cli->id) }}"> Detalhes</a>
                <a href="{{ route('produto.edit', $cli->id) }}"> Editar</a>
            ]
        </p>
        <hr>
    @endforeach

    <hr>

    @if (isset($filters))    
        {{ $produto->appends($filters)->links() }}
    @else 
        {{ $produto->links() }}
    @endif

@endsection
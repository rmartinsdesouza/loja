@extends('Partials.app')

@section('title',  'Listagem das Clientes')

@section('content')

    <a href="{{ route('cliente.create') }}"> Criar Novo Cliente</a>
    <hr>

    @if(session('message'))
        <div>
            {{ session('message') }}
        </div>    
    @endif

    <form action="{{ route('cliente.search') }}" method="post">
        @csrf
        <input type="text" name="search" placeholder="Filtrar:">
        <button type="submit">Filtrar</button>

    @foreach($cliente as $key => $cli)
        <p>
            
            {{ $cli->id }}
            {{ $cli->nome }}
            {{ $cli->dtnascimento }}
            [
                <a href="{{ route('cliente.show', $cli->id) }}"> Detalhes</a>
                <a href="{{ route('cliente.edit', $cli->id) }}"> Editar</a>
            ]
        </p>
        <hr>
    @endforeach

    <hr>

    @if (isset($filters))    
        {{ $cliente->appends($filters)->links() }}
    @else 
        {{ $cliente->links() }}
    @endif

@endsection
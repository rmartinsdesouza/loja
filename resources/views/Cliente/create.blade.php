@extends('Partials.app')

@section('title', 'Criação de Clientes' )

@section('content')
    <h1> Cadastrar Novo Clientes</h1>

    <div>
    <form action="{{ route('cliente.store') }}" method="post" enctype="multipart/form-data">
        
        @include('Partials.formCliente')

    </form>
    </div>
@endsection
@extends('Partials.app')

@section('title', 'Criação de Produtos' )

@section('content')
    <h1> Cadastrar Novo Produtos</h1>

    <div>
    <form action="{{ route('produto.store') }}" method="post" enctype="multipart/form-data">
        
        @include('Partials.formCliente')

    </form>
    </div>
@endsection
@extends('Partials.app')

@section('title', "Editar Produto {{ $produto->title }}")

@section('content')    
    <h1>Editar a Produto</h1>

    <form action="{{ route('produto.update', $produto->id) }}" method="post" enctype="multipart/form-data">
        @method('put')
        
        @include('Partials.formProduto')
        
    </form>
@endsection
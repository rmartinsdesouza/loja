@extends('Partials.app')

@section('title', "Editar Cliente {{ $cliente->title }}")

@section('content')    
    <h1>Editar a Cliente</h1>

    <form action="{{ route('cliente.update', $cliente->id) }}" method="post" enctype="multipart/form-data">
        @method('put')
        
        @include('Partials.formCliente')
        
    </form>
@endsection
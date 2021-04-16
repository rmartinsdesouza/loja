<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ config('app.name') }}</title>

    {{-- <link rel="stylesheet" href="{{ url('css/app.css') }}"> --}}

</head>
<body>
    <h1> App Loja </h1>
    
    @if ($errors->any())
        <ul>
            @foreach($errors->all() as $erro)
                <li> {{ $erro }} </li>
            @endforeach
        </ul>
    @endif

    <div>
        @yield('content')
    </div>
</body>
</html>
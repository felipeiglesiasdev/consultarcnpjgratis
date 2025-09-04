<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Consulta CNPJ — Rápido e Completo')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    
    @if (request()->routeIs('home'))
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @elseif (request()->routeIs('consultar-cnpj'))
        <link rel="stylesheet" href="{{ asset('css/consulta-cnpj.css') }}">
    @elseif (request()->routeIs('listas-segmentadas'))
        <link rel="stylesheet" href="{{ asset('css/listas-segmentadas.css') }}">
    @elseif (request()->routeIs('cnpj.show'))
        <link rel="stylesheet" href="{{ asset('css/cnpj-show.css') }}">
    @endif

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    


</head>
<body class="bg-body">
    @include('components.header')

    <main>
        @yield('content')
    </main>

    @include('components.footer')
    <script src="{{ asset('js/header.js') }}"></script>
    <script src="{{ asset('js/consulta-cnpj.js') }}"></script>
    @stack('scripts')
</body>
</html>

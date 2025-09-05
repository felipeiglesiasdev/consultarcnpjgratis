<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Consulta CNPJ — Rápido e Completo')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- TAG ROBOTS --}}
    <meta name="robots" content="index, follow">

    {{-- Placeholders para Description e Keywords --}}
    <meta name="description" content="@yield('meta_description', 'Consulte CNPJs de forma rápida e gratuita. Obtenha informações completas de qualquer empresa no Brasil.')">
    <meta name="keywords" content="@yield('meta_keywords', 'consulta cnpj, cnpj, receita federal, dados de empresa, consulta gratis')">

    {{-- Placeholder para as tags Open Graph --}}
    @yield('og-tags')

    {{-- ESPAÇO PARA A TAG CANONICAL --}}
    @yield('canonical')

    {{-- ESPAÇO PARA DADOS ESTRUTURADOS (JSON-LD) --}}
    @yield('structured-data')


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

    @if (request()->routeIs('consultar-cnpj'))
        <script src="{{ asset('js/mask.js') }}" defer></script>
    @elseif (request()->routeIs('cnpj.show'))
        <script src="{{ asset('js/mask.js') }}" defer></script>
    @endif
    
    <script src="{{ asset('js/consulta-cnpj.js') }}"></script>
    @stack('scripts')
</body>
</html>

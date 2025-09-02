@extends('layouts.app')

@section('title', 'CNPJ Total — A plataforma de dados que impulsiona seu negócio')

@section('content')

{{-- 1. Seção Hero --}}
<section class="hero-home">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title-home">A plataforma de dados empresariais que impulsiona o seu negócio</h1>
            <p class="hero-subtitle-home">Consulte CNPJs, analise o mercado e encontre novos clientes com precisão e rapidez. Tudo em um só lugar.</p>
            <div class="hero-buttons">
                <a href="{{ route('consultar-cnpj') }}" class="btn btn-primary btn-lg">Consultar CNPJ Grátis</a>
                <a href="#" class="btn btn-secondary btn-lg">Nossos Serviços</a>
            </div>
        </div>
    </div>
</section>


{{-- 3. Seção de Serviços --}}
<section class="services-section">
    <div class="container">
        <h2 class="section-title">Inteligência de dados para cada necessidade</h2>
        <div class="services-grid">
            <div class="service-card">
                <i class="bi bi-search-heart"></i>
                <h3>Consulta Simples e Rápida</h3>
                <p>Acesse instantaneamente os dados cadastrais de qualquer empresa no Brasil. Ideal para verificações rápidas e gratuitas.</p>
                <a href="{{ route('consultar-cnpj') }}" class="card-link">Comece a consultar <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="service-card">
                <i class="bi bi-graph-up-arrow"></i>
                <h3>Análise e Dados Avançados</h3>
                <p>Mergulhe fundo com informações detalhadas sobre sócios, faturamento presumido, e muito mais.</p>
                <a href="{{ route('consulta-avancada-cnpj') }}" class="card-link">Saiba mais <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="service-card">
                <i class="bi bi-filter-circle"></i>
                <h3>Listas Segmentadas</h3>
                <p>Encontre seus próximos clientes com listas de empresas filtradas por setor, localização, porte e muito mais.</p>
                <a href="{{ route('listas-segmentadas') }}" class="card-link">Ver segmentações <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

{{-- 4. Seção "Como Funciona" --}}
<section class="how-it-works">
    <div class="container">
        <h2 class="section-title">Simples, Rápido e Poderoso</h2>
        <div class="steps-container">
            <div class="step">
                <div class="step-number">1</div>
                <h3>Digite o CNPJ</h3>
                <p>Insira os 14 dígitos do CNPJ na nossa ferramenta de busca.</p>
            </div>
            <div class="step-arrow"><i class="bi bi-chevron-right"></i></div>
            <div class="step">
                <div class="step-number">2</div>
                <h3>Acesse os Dados</h3>
                <p>Visualize instantaneamente todas as informações públicas da empresa.</p>
            </div>
            <div class="step-arrow"><i class="bi bi-chevron-right"></i></div>
            <div class="step">
                <div class="step-number">3</div>
                <h3>Tome Decisões</h3>
                <p>Use os dados para validar fornecedores, analisar concorrentes ou prospectar clientes.</p>
            </div>
        </div>
    </div>
</section>

{{-- 5. Seção de CTA Final --}}
<section class="cta-section">
    <div class="container">
        <h2>Pronto para transformar dados em oportunidades?</h2>
        <p>Comece hoje mesmo com nossa consulta gratuita ou explore nossas soluções avançadas.</p>
        <a href="{{ route('consultar-cnpj') }}" class="btn btn-primary btn-lg">Começar Agora</a>
    </div>
</section>

@endsection
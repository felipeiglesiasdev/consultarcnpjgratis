@extends('layouts.app')

@section('title', 'Listas de Empresas Segmentadas para Prospecção B2B')

@section('content')

{{-- 1. Seção Hero --}}
<section class="hero-section-lists">
    <div class="container hero-lists-container">
        <div class="hero-lists-content">
            <h1 class="hero-title">Encontre Seus Clientes Ideais com Listas de Empresas Segmentadas</h1>
            <p class="hero-subtitle">Filtre milhões de empresas ativas no Brasil por setor, localização, porte e muito mais. Crie listas personalizadas e acelere sua prospecção B2B.</p>
            <a href="https://wa.me/55119XXXXXXXX?text=Ol%C3%A1%21+Gostaria+de+um+or%C3%A7amento+para+listas+segmentadas." 
               class="btn btn-primary btn-lg"
               target="_blank" 
               rel="nofollow noopener noreferrer">
               Solicitar Orçamento
            </a>
        </div>
        <div class="hero-lists-image">
            {{-- Você pode substituir por uma imagem ou ilustração real --}}
            <img src="https://via.placeholder.com/500x450?text=Ilustração+de+Dados" alt="Ilustração de dados e segmentação de mercado">
        </div>
    </div>
</section>

{{-- 2. Seção de Vantagens --}}
<section class="features-section">
    <div class="container">
        <h2 class="section-title">Vantagens de usar listas focadas</h2>
        <div class="features-grid">
            <div class="feature-card">
                <i class="bi bi-bullseye"></i>
                <h3>Prospecção Direcionada</h3>
                <p>Pare de atirar no escuro. Fale diretamente com as empresas que têm o perfil ideal para o seu negócio.</p>
            </div>
            <div class="feature-card">
                <i class="bi bi-graph-up"></i>
                <h3>Aumente sua Conversão</h3>
                <p>Leads qualificados resultam em taxas de conversão mais altas, otimizando o tempo da sua equipe de vendas.</p>
            </div>
            <div class="feature-card">
                <i class="bi bi-clock-history"></i>
                <h3>Economize Tempo</h3>
                <p>Nós fazemos o trabalho pesado de mineração de dados. Receba uma lista pronta para usar e foque no que importa: vender.</p>
            </div>
        </div>
    </div>
</section>

{{-- 3. Seção de Filtros Disponíveis --}}
<section class="filters-section">
    <div class="container">
        <h2 class="section-title">Filtros Poderosos à Sua Disposição</h2>
        <p class="section-subtitle">Combine dezenas de filtros para criar a lista perfeita para sua campanha.</p>
        <div class="filters-list">
            <div class="filter-item"><i class="bi bi-building"></i> Atividade (CNAE)</div>
            <div class="filter-item"><i class="bi bi-geo-alt"></i> Localização (Estado, Cidade, Bairro)</div>
            <div class="filter-item"><i class="bi bi-people"></i> Porte da Empresa</div>
            <div class="filter-item"><i class="bi bi-check-circle"></i> Situação Cadastral (Ativa, etc)</div>
            <div class="filter-item"><i class="bi bi-calendar-event"></i> Data de Abertura</div>
            <div class="filter-item"><i class="bi bi-briefcase"></i> Natureza Jurídica</div>
            <div class="filter-item"><i class="bi bi-currency-dollar"></i> Capital Social</div>
            <div class="filter-item"><i class="bi bi-plus-circle"></i> E muito mais...</div>
        </div>
    </div>
</section>

{{-- 4. Seção "Como Funciona" --}}
<section class="how-it-works">
    <div class="container">
        <h2 class="section-title">Receba sua lista em 3 passos simples</h2>
        <div class="steps-container">
            <div class="step">
                <div class="step-number">1</div>
                <h3>Defina seu Público</h3>
                <p>Você nos informa quais filtros e segmentações precisa para montar sua lista de clientes ideais.</p>
            </div>
            <div class="step-arrow"><i class="bi bi-chevron-right"></i></div>
            <div class="step">
                <div class="step-number">2</div>
                <h3>Receba a Proposta</h3>
                <p>Nossa equipe analisa sua solicitação e envia um orçamento personalizado com uma amostra dos dados.</p>
            </div>
            <div class="step-arrow"><i class="bi bi-chevron-right"></i></div>
            <div class="step">
                <div class="step-number">3</div>
                <h3>Acesse sua Lista</h3>
                <p>Após a aprovação, você recebe a lista completa no formato que preferir (.csv, .xlsx) e começa a prospectar.</p>
            </div>
        </div>
    </div>
</section>

{{-- 5. Seção de CTA Final --}}
<section class="cta-section">
    <div class="container">
        <h2>Pronto para acelerar sua prospecção?</h2>
        <p>Fale com um de nossos especialistas e descubra como nossas listas podem gerar mais resultados para o seu negócio.</p>
        <a href="https://wa.me/55119XXXXXXXX?text=Ol%C3%A1%21+Gostaria+de+um+or%C3%A7amento+para+listas+segmentadas." 
           class="btn btn-primary btn-lg"
           target="_blank" 
           rel="nofollow noopener noreferrer">
           Falar com um Especialista
        </a>
    </div>
</section>

{{-- 6. Seção de FAQ --}}
<section class="faq-section">
    <div class="container">
        <h2 class="section-title">Dúvidas Comuns</h2>
        <div class="faq-container">
            <details class="faq-item">
                <summary>Os contatos (e-mail, telefone) estão inclusos na lista?</summary>
                <p>Sim, nossas listas enriquecidas podem incluir telefones, e-mails e outras informações de contato, quando disponíveis publicamente, para facilitar sua prospecção.</p>
            </details>
            <details class="faq-item">
                <summary>Qual o formato de entrega da lista?</summary>
                <p>Entregamos as listas nos formatos mais comuns, como Planilhas Google, Excel (.xlsx) ou CSV, prontos para serem importados no seu CRM ou ferramenta de automação.</p>
            </details>
            <details class="faq-item">
                <summary>Como os dados são atualizados?</summary>
                <p>Nossa base de dados é sincronizada continuamente com fontes oficiais, garantindo que você receba listas com as informações mais recentes e precisas disponíveis no mercado.</p>
            </details>
        </div>
    </div>
</section>

@endsection
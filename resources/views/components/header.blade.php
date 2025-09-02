{{-- O itemscope e itemtype informam ao Google que este bloco representa sua organização --}}
<header class="header" itemscope itemtype="https://schema.org/Organization">
    <div class="header-container">
        <div class="header-logo">
            {{-- O itemprop="url" aponta para a página inicial da organização --}}
            <a href="{{ route('home') }}" class="logo" itemprop="url" title="Voltar para a página inicial do CNPJ Total">

                <img src="{{ asset('images/logo/logo-branco-vermelho.webp') }}" 
                     alt="Logo CNPJ Total - Consulta de CNPJ Online" 
                     width="160" 
                     height="40" 
                     itemprop="logo"
                     class="logo-default"> 
                
                <img src="{{ asset('images/logo/logo-preto-vermelho.webp') }}" 
                     alt="Logo CNPJ Total - Consulta de CNPJ Online" 
                     width="160" 
                     height="40" 
                     itemprop="logo"
                     class="logo-scrolled"> 
            </a>
        </div>

        {{-- Botão do Menu Mobile (Hamburger) --}}
        {{-- Fica escondido em telas grandes e aparece em telas pequenas --}}
        {{-- Botão do Menu Mobile (Hamburger) com Ícones do Bootstrap --}}
        <button class="header-toggle" aria-controls="main-nav" aria-expanded="false">
            <span class="sr-only">Abrir menu</span>
            {{-- Ícone de "hamburger" (list) e "fechar" (x-lg) --}}
            <i class="bi bi-list icon-menu"></i>
            <i class="bi bi-x-lg icon-close"></i>
        </button>

        {{-- O <nav> agora tem um ID para ser controlado pelo botão --}}
        <nav class="header-nav" id="main-nav" role="navigation" aria-label="Navegação Principal" itemscope itemtype="https://schema.org/SiteNavigationElement">
            <ul>
                <li itemprop="name"><a itemprop="url" href="{{ route('home') }}" title="Ir para a página inicial" @if(request()->routeIs('home')) aria-current="page" @endif>Início</a></li>
                <li itemprop="name"><a itemprop="url" href="{{ route('consultar-cnpj') }}" title="Use nossa ferramenta gratuita para consultar CNPJ" @if(request()->routeIs('consultar-cnpj')) aria-current="page" @endif>Consultar CNPJ</a></li>
                <li itemprop="name"><a itemprop="url" href="{{ route('consulta-avancada-cnpj') }}" title="Veja informações detalhadas com a consulta avançada" @if(request()->routeIs('consulta-avancada-cnpj')) aria-current="page" @endif>Consulta Avançada</a></li>
                <li itemprop="name"><a itemprop="url" href="{{ route('listas-segmentadas') }}" title="Encontre listas de empresas por segmento" @if(request()->routeIs('listas-segmentadas')) aria-current="page" @endif>Listas Segmentadas</a></li>
                <li>
                    <a href="" 
                       class="btn btn-primary btn-orcamento" 
                       title="Solicite um orçamento via WhatsApp" 
                       target="_blank" 
                       rel="nofollow noopener noreferrer">
                        <i class="bi bi-whatsapp"></i>
                        <span>Orçamento</span>
                    </a>
                </li>
            </ul>
        </nav>
        
        
    </div>
</header>
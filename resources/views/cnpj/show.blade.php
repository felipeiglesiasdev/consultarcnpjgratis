@extends('layouts.app')

@section('title', $data['razao_social'] . ' - CNPJ ' . $data['cnpj_completo'])

@section('content')

<div class="page-background">
    <div class="cnpj-show-layout">

        <main class="cnpj-main-content">
            <p class="seo-intro-text">
                Consulte abaixo os dados públicos da empresa <strong>{{ $data['razao_social'] }}</strong>, inscrita sob o CNPJ <strong>{{ $data['cnpj_completo'] }}</strong>. 
                Fundada em <strong>{{ $data['data_abertura'] }}</strong>, a organização está localizada na cidade de <strong>{{ $data['cidade'] }}</strong> e atua principalmente no setor de <strong>"{{ $data['cnae_principal']['descricao'] }}"</strong>.
                Veja abaixo detalhes sobre a situação cadastral, endereço, quadro de sócios e outras informações relevantes.
            </p>
            {{-- CARD 1: INFORMAÇÕES DO CNPJ --}}
            <div class="data-card">
                <div class="card-header">
                    <i class="bi bi-building header-icon"></i>
                    <h2>Informações do CNPJ</h2>
                </div>
                <div class="card-body">
                    <div class="data-item">
                        <span class="label">CNPJ</span>
                        <span class="value">{{ $data['cnpj_completo'] }}</span>
                    </div>
                    <div class="data-item">
                        <span class="label">Razão Social</span>
                        <span class="value">{{ $data['razao_social'] }}</span>
                    </div>
                    <div class="data-item">
                        <span class="label">Nome Fantasia</span>
                        <span class="value">{{ $data['nome_fantasia'] ?? 'Não informado' }}</span>
                    </div>
                    <div class="data-item">
                        <span class="label">Natureza Jurídica</span>
                        <span class="value">{{ $data['natureza_juridica'] }}</span>
                    </div>
                    <div class="data-item">
                        <span class="label">Capital Social</span>
                        <span class="value">R$ {{ $data['capital_social'] }}</span>
                    </div>
                    <div class="data-item">
                        <span class="label">Porte da Empresa</span>
                        <span class="value">{{ $data['porte'] ?? 'Não informado' }}</span>
                    </div>
                    <div class="data-item">
                        <span class="label">Matriz ou Filial</span>
                        <span class="value">{{ $data['matriz_ou_filial'] }}</span>
                    </div>
                    <div class="data-item">
                        <span class="label">Data de Abertura</span>
                        <span class="value">{{ $data['data_abertura'] }}</span>
                    </div>
                </div>
            </div>

            {{-- CARD 2: SITUAÇÃO CADASTRAL --}}
            <div class="data-card {{ $data['situacao_cadastral'] === 'ATIVA' ? 'card--active' : '' }}">
                <div class="card-header">
                    <i class="bi bi-patch-check-fill header-icon"></i>
                    <h2>Situação Cadastral</h2>
                </div>
                <div class="card-body">
                    <div class="data-item">
                        <span class="label">Situação Cadastral</span>
                        <span class="value">
                            <span class="status-badge {{ $data['situacao_cadastral_classe'] }}">
                                {{ $data['situacao_cadastral'] }}
                            </span>
                        </span>
                    </div>
                    <div class="data-item">
                        <span class="label">Data da Situação Cadastral</span>
                        <span class="value">{{ $data['data_situacao_cadastral'] }}</span>
                    </div>
                </div>
                {{-- TEXTO PROMOCIONAL CONDICIONAL --}}
                @if ($data['situacao_cadastral'] === 'ATIVA')
                    <div class="card-promo-text">
                        Esta empresa pode se tornar seu cliente! <a href="{{ route('listas-segmentadas') }}">Nós filtramos empresas como esta para você.</a>
                    </div>
                @endif
            </div>

            {{-- CARD 3: ATIVIDADES ECONÔMICAS --}}
            <div class="data-card">
                <div class="card-header">
                    <i class="bi bi-briefcase-fill header-icon"></i>
                    <h2>Atividades Econômicas (CNAE)</h2>
                </div>
                <div class="card-body">
                    <div class="cnae-section-title">Atividade Principal</div>
                    <div class="cnae-item cnae-item--principal">
                        <div class="cnae-code">{{ $data['cnae_principal']['codigo'] }}</div>
                        <div class="cnae-description">{{ $data['cnae_principal']['descricao'] }}</div>
                    </div>

                    @if (!empty($data['cnaes_secundarios']))
                        <div class="cnae-section-title" style="margin-top: 1rem;">Atividades Secundárias</div>
                        @foreach ($data['cnaes_secundarios'] as $cnae)
                            <div class="cnae-item">
                                <div class="cnae-code">{{ $cnae['codigo'] }}</div>
                                <div class="cnae-description">{{ $cnae['descricao'] }}</div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            
            {{-- CARD 4: ENDEREÇO --}}
            <div class="data-card">
                <div class="card-header">
                    <i class="bi bi-geo-alt-fill header-icon"></i>
                    <h2>Endereço</h2>
                </div>
                <div class="address-card-body">
                    <div class="address-grid">
                        <div class="data-item">
                            <span class="label">Logradouro</span>
                            <span class="value">{{ $data['logradouro'] }}</span>
                        </div>
                        <div class="data-item">
                            <span class="label">Bairro</span>
                            <span class="value">{{ $data['bairro'] }}</span>
                        </div>
                         <div class="data-item">
                            <span class="label">Complemento</span>
                            <span class="value">{{ $data['complemento'] ?? 'N/A' }}</span>
                        </div>
                        <div class="data-item">
                            <span class="label">Cidade / UF</span>
                            <span class="value">{{ $data['cidade_uf'] }}</span>
                        </div>
                        <div class="data-item">
                            <span class="label">CEP</span>
                            <span class="value">{{ $data['cep'] }}</span>
                        </div>
                    </div>
                    <div class="address-map-col">
                        <div class="map-container">
                            <a href="{{ $data['google_maps_url'] }}" class="btn btn-secondary map-link" target="_blank" rel="nofollow noopener noreferrer" style="display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                                <i class="bi bi-map-fill"></i> Abrir no Mapa
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- CARD 5: CONTATO --}}
            @if (!empty($data['telefone_1']) || !empty($data['telefone_2']) || !empty($data['email']))
                <div class="data-card">
                    <div class="card-header">
                        <i class="bi bi-telephone-fill header-icon"></i>
                        <h2>Contato</h2>
                    </div>
                    <div class="card-body">
                        @if (!empty($data['telefone_1']))
                            <div class="data-item">
                                <span class="label">Telefone 1</span>
                                <span class="value"><a href="tel:{{ preg_replace('/\D/', '', $data['telefone_1']) }}" rel="nofollow">{{ $data['telefone_1'] }}</a></span>
                            </div>
                        @endif
                        @if (!empty($data['telefone_2']))
                            <div class="data-item">
                                <span class="label">Telefone 2</span>
                                <span class="value"><a href="tel:{{ preg_replace('/\D/', '', $data['telefone_2']) }}" rel="nofollow">{{ $data['telefone_2'] }}</a></span>
                            </div>
                        @endif
                        @if (!empty($data['email']))
                            <div class="data-item">
                                <span class="label">E-mail</span>
                                <span class="value"><a href="mailto:{{ strtolower($data['email']) }}" rel="nofollow">{{ strtolower($data['email']) }}</a></span>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            {{-- CARD 6: QUADRO SOCIETÁRIO --}}
            @if (!empty($data['quadro_societario']))
                <div class="data-card">
                    <div class="card-header">
                        <i class="bi bi-people-fill header-icon"></i>
                        <h2>Quadro Societário (QSA)</h2>
                    </div>
                    <div style="padding: 1.5rem;">
                        <table class="qsa-table">
                            <thead>
                                <tr>
                                    <th>Nome do Sócio</th>
                                    <th>Qualificação</th>
                                    <th>Data de Entrada</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['quadro_societario'] as $socio)
                                    <tr>
                                        <td data-label="Nome">{{ $socio['nome'] }}</td>
                                        <td data-label="Qualificação">{{ $socio['qualificacao'] }}</td>
                                        <td data-label="Entrada">{{ $socio['data_entrada'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

            {{-- SEÇÃO DE EMPRESAS SEMELHANTES --}}
            @if (!empty($data['empresas_semelhantes']))
                <div class="similar-companies-section">
                    <div class="similar-companies-header">
                        <i class="bi bi-diagram-3-fill header-icon"></i>
                        <h2>Empresas Semelhantes</h2>
                    </div>
                    {{-- TEXTO DESCRITIVO ADICIONADO AQUI --}}
                    <p class="similar-companies-subtitle">
                        Listando empresas com a mesma atividade principal <strong>({{ $data['similar_context']['cnae_descricao'] }})</strong>, localizadas em <strong>{{ $data['similar_context']['cidade'] }}</strong>.
                    </p>
                    <div class="similar-companies-grid">
                        @foreach ($data['empresas_semelhantes'] as $semelhante)
                            <a href="{{ $semelhante['url'] }}" class="similar-company-card" title="{{ $semelhante['razao_social'] }}">
                                <span class="company-name">{{ $semelhante['razao_social'] }}</span>
                                <span class="company-location">{{ $semelhante['cidade_uf'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

        </main>

        {{-- COLUNA LATERAL --}}
        <aside class="cnpj-sidebar">
            <div class="sidebar-widget">
                <h3><i class="bi bi-plus-circle header-icon"></i> Nova Consulta</h3>
                {{-- TEXTO DESCRITIVO ADICIONADO --}}
                <p class="widget-description">
                    Deseja pesquisar outro CNPJ? Utilize o campo abaixo.
                </p>
                <form class="search-form" action="{{ route('cnpj.consultar') }}" method="POST">
                    @csrf
                    <input type="text" name="cnpj" id="cnpj" class="search-input" placeholder="00.000.000/0000-00" required>
                    {{-- BOTÃO ATUALIZADO COM ÍCONE --}}
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-search"></i>
                        <span>Consultar</span>
                    </button>
                </form>
                
            </div>
            <div class="sidebar-widget ad-widget">
                <h3>Precisando de Mais Dados?</h3>
                <p>Encontre seus próximos clientes com listas de empresas altamente segmentadas.</p>
                <a href="{{ route('listas-segmentadas') }}" class="btn btn-secondary">Conhecer Listas</a>
            </div>
        </aside>
    </div>

    {{-- POPUP DE ERRO - MESMO DO CONSULTAR CNPJ --}}
    <div id="error-popup" class="error-popup">
        <div class="popup-content">
            <span class="popup-close" id="popup-close">&times;</span>
            <div class="popup-icon" id="popup-icon"></div>
            <h4 id="popup-title"></h4>
            <p id="popup-message"></p>
            <button id="popup-confirm" class="btn btn-primary popup-confirm-btn">Entendido</button>
        </div>
    </div>
</div>


@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    @if(session('error'))
        // Verifica se a função global 'showPopup' existe (criada no app.js)
        if (typeof window.showPopup === 'function') {
            // CHAMA O POPUP DE ERRO DE BACK-END
            window.showPopup(
                'bi-emoji-frown', // Ícone de carinha triste
                'CNPJ não encontrado',
                'Lamentamos, mas não encontramos este CNPJ em nossa base de dados. Por favor, verifique o número e tente novamente.',
                false // não é um erro crítico, é um aviso
            );
        }
    @endif
});
</script>
@endpush

@endsection

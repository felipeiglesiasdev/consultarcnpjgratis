@extends('layouts.app')

@section('canonical')
    <link rel="canonical" href="{{ url()->current() }}" />
@endsection

@section('structured-data')
{{-- A diretiva @json converte o array PHP do controller em um JSON perfeito e seguro --}}
<script type="application/ld+json">
@json($data['structured_data'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT)
</script>
@endsection


{{-- Renderiza dinamicamente as meta tags OG --}}
@section('og-tags')
    @foreach($data['og_data'] as $property => $content)
<meta property="{{ $property }}" content="{{ $content }}">
    @endforeach
@endsection


@section('title', $data['razao_social'] . ' - CNPJ ' . $data['cnpj_completo'])
@section('meta_description', $data['meta_data']['description'])
@section('meta_keywords', $data['meta_data']['keywords'])

@section('content')

<div class="page-background">
    <div class="cnpj-show-layout">
        <main class="cnpj-main-content">
            {{-- TEXTO DE INTRODUÇÃO --}}
            <x-cnpj.intro-text :data="$data" />
            {{-- CARD 1: INFORMAÇÕES DO CNPJ --}}
            <x-cnpj.informacoes-cnpj :data="$data" />
            {{-- CARD 2: SITUAÇÃO CADASTRAL --}}
            <x-cnpj.situacao-cadastral :data="$data" />
            {{-- CARD 3: ATIVIDADES ECONÔMICAS --}}
            <x-cnpj.atividades-economicas :data="$data" />
            {{-- CARD 4: ENDEREÇO --}}
            <x-cnpj.endereco :data="$data" />
            {{-- CARD 5: CONTATO --}}
            <x-cnpj.contato :data="$data" />
            {{-- CARD 6: QUADRO SOCIETÁRIO --}}
            <x-cnpj.qsa :data="$data" />
            {{-- CARD 7: EMPRESAS SEMELHANTES --}}
            <x-cnpj.empresas-semelhantes :data="$data" />
            {{--  --}}
            <x-cnpj.removal-section :data="$data" />
        </main>
        {{-- COLUNA LATERAL (SIDEBAR) --}}
        <x-cnpj.sidebar />
    </div>

    {{-- POPUP DE ERRO CONSULTAR CNPJ --}}
    <x-cnpj.popup-erro-consulta />

    
</div>





@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Seleciona os elementos do modal com os NOMES CORRIGIDOS
    const modalOverlay = document.getElementById('removalModalOverlay');
    const openModalBtn = document.getElementById('openRemovalModal');
    const closeModalBtn = document.getElementById('closeRemovalModal');
    const removalForm = document.getElementById('removalForm');
    const responseMessageDiv = document.getElementById('modal-response-message');

    // O resto do script permanece igual, pois ele usa IDs que não mudaram
    if (!modalOverlay) return; // Garante que o código só execute se o modal existir

    openModalBtn.addEventListener('click', function(e) {
        e.preventDefault();
        modalOverlay.style.display = 'flex';
    });

    closeModalBtn.addEventListener('click', function() {
        modalOverlay.style.display = 'none';
    });

    modalOverlay.addEventListener('click', function(e) {
        if (e.target === modalOverlay) {
            modalOverlay.style.display = 'none';
        }
    });

    removalForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(removalForm);
        const submitButton = removalForm.querySelector('button[type="submit"]');
        submitButton.disabled = true;
        submitButton.textContent = 'Enviando...';

        fetch('{{ route('solicitacao.remocao.store') }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            }
        })
        .then(response => response.json())
        .then(data => {
            responseMessageDiv.style.display = 'block';
            if (data.errors) {
                responseMessageDiv.className = 'response-message error';
                let errorHtml = '<ul>';
                for (const error in data.errors) {
                    errorHtml += `<li>${data.errors[error][0]}</li>`;
                }
                errorHtml += '</ul>';
                responseMessageDiv.innerHTML = errorHtml;
            } else {
                responseMessageDiv.className = 'response-message success';
                responseMessageDiv.textContent = data.success;
                // Opcional: resetar e esconder o form após o sucesso
                removalForm.style.display = 'none'; 
            }
        })
        .catch(error => {
            responseMessageDiv.style.display = 'block';
            responseMessageDiv.className = 'response-message error';
            responseMessageDiv.textContent = 'Ocorreu um erro inesperado. Tente novamente mais tarde.';
            console.error('Error:', error);
        })
        .finally(() => {
            submitButton.disabled = false;
            submitButton.textContent = 'Enviar Solicitação';
        });
    });
});
</script>
@endpush
@endsection

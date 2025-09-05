

// Validação do formulário de CNPJ e controle do popup (VERSÃO FINAL)
document.addEventListener('DOMContentLoaded', function() {
    // --- Elementos do DOM ---
    const searchForm = document.querySelector('.search-form');
    const cnpjInput = document.getElementById('cnpj');
    const errorPopup = document.getElementById('error-popup');
    const popupClose = document.getElementById('popup-close');
    const popupConfirmBtn = document.getElementById('popup-confirm');
    const body = document.body;

    // Elementos do conteúdo do popup que vamos alterar
    const popupIcon = document.getElementById('popup-icon');
    const popupTitle = document.getElementById('popup-title');
    const popupMessage = document.getElementById('popup-message');

    // --- Garante que o código só rode na página certa ---
    if (!searchForm || !cnpjInput || !errorPopup) {
        return; // Sai da função se os elementos essenciais não existirem
    }

    // --- FUNÇÃO CENTRALIZADA E GLOBAL ---
    // Atribuímos a função à 'window' para que ela possa ser chamada de qualquer lugar
    window.showPopup = (iconClass, title, message, isError) => {
        if (!popupIcon || !popupTitle || !popupMessage) return;

        // Preenche o conteúdo do popup
        popupIcon.innerHTML = `<i class="bi ${iconClass}"></i>`;
        popupTitle.textContent = title;
        popupMessage.textContent = message;

        // Muda a cor do ícone
        popupIcon.style.color = isError ? 'var(--brand-red)' : 'var(--gray-600)';

        // Mostra o popup e trava a rolagem
        errorPopup.style.display = 'block';
        body.classList.add('popup-open');
    }

    // --- Função para esconder o popup ---
    const hidePopup = () => {
        if (errorPopup) {
            errorPopup.style.display = 'none';
            body.classList.remove('popup-open');
        }
    }

    // --- Lógica de Eventos ---
    searchForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const cnpjOnlyNumbers = cnpjInput.value.replace(/\D/g, '');

        if (cnpjOnlyNumbers.length < 14) {
            // Chama o popup de erro de FRONT-END
            window.showPopup(
                'bi-exclamation-triangle',
                'CNPJ Incompleto',
                'Por favor, digite os 14 números do CNPJ para continuar.',
                true // é um erro
            );
        } else {
            searchForm.submit();
        }
    });

    // Eventos para fechar o popup
    popupClose.addEventListener('click', hidePopup);
    popupConfirmBtn.addEventListener('click', hidePopup);
    window.addEventListener('click', (event) => {
        if (event.target == errorPopup) {
            hidePopup();
        }
    });
    cnpjInput.addEventListener('input', () => {
        if (body.classList.contains('popup-open')) {
            hidePopup();
        }
    });
});
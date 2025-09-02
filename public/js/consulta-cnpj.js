// Adiciona a máscara de CNPJ ao campo de input
document.addEventListener('DOMContentLoaded', function() {
    const cnpjInput = document.getElementById('cnpj');

    if (cnpjInput) {
        cnpjInput.addEventListener('input', function(e) {
            // Remove tudo que não for dígito
            let value = e.target.value.replace(/\D/g, '');

            // Limita a 14 dígitos
            value = value.substring(0, 14);

            // Aplica a máscara
            if (value.length > 12) {
                value = value.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
            } else if (value.length > 8) {
                value = value.replace(/^(\d{2})(\d{3})(\d{3})(\d{1,4})/, '$1.$2.$3/$4');
            } else if (value.length > 5) {
                value = value.replace(/^(\d{2})(\d{3})(\d{1,3})/, '$1.$2.$3');
            } else if (value.length > 2) {
                value = value.replace(/^(\d{2})(\d{1,3})/, '$1.$2');
            }

            e.target.value = value;
        });
    }
});


// Validação do formulário de CNPJ e controle do popup (Refatorado)
document.addEventListener('DOMContentLoaded', function() {
    const searchForm = document.querySelector('.search-form');
    const cnpjInput = document.getElementById('cnpj');
    const errorPopup = document.getElementById('error-popup');
    const popupClose = document.getElementById('popup-close');
    const popupConfirmBtn = document.getElementById('popup-confirm');
    const body = document.body;

    if (searchForm && cnpjInput && errorPopup && popupClose && popupConfirmBtn) {
        
        // Função para MOSTRAR o popup
        const showPopup = () => {
            errorPopup.style.display = 'block';
            body.classList.add('popup-open'); // Trava a rolagem
        }

        // Função para ESCONDER o popup
        const hidePopup = () => {
            errorPopup.style.display = 'none';
            body.classList.remove('popup-open'); // Libera a rolagem
        }

        searchForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const cnpjValue = cnpjInput.value;
            const cnpjOnlyNumbers = cnpjValue.replace(/\D/g, '');

            if (cnpjOnlyNumbers.length < 14) {
                showPopup(); // Chama a função para mostrar
            } else {
                searchForm.submit();
            }
        });

        // Eventos para fechar o popup
        popupClose.addEventListener('click', hidePopup);
        popupConfirmBtn.addEventListener('click', hidePopup); // Adiciona o novo botão

        window.addEventListener('click', function(event) {
            if (event.target == errorPopup) {
                hidePopup();
            }
        });
        
        cnpjInput.addEventListener('input', function() {
            if (body.classList.contains('popup-open')) {
                hidePopup();
            }
        });
    }
});
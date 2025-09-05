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
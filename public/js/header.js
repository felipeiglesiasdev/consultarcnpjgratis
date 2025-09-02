document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.header-toggle');
    const mainNav = document.querySelector('#main-nav');
    const body = document.body;

    if (menuToggle && mainNav) {
        menuToggle.addEventListener('click', function() {
            // Alterna a classe no body para mostrar/esconder o menu
            body.classList.toggle('nav-open');
            
            // Atualiza o atributo ARIA para acessibilidade
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', !isExpanded);
        });
    }
});

// Efeito de scroll para o header
document.addEventListener('DOMContentLoaded', function() {
    const header = document.querySelector('.header');

    if (header) {
        const handleScroll = () => {
            // Adiciona a classe .header-scrolled se a página for rolada mais de 50px
            // Remove a classe se voltar para o topo
            if (window.scrollY > 50) {
                header.classList.add('header-scrolled');
            } else {
                header.classList.remove('header-scrolled');
            }
        };

        // Adiciona o 'escutador' de evento de scroll na janela
        window.addEventListener('scroll', handleScroll);
    }
});
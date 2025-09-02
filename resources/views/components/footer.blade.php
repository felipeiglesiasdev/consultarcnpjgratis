<footer class="footer">
    <div class="container">
        <div class="footer-container">
            {{-- Coluna 1: Logo e Descrição --}}
            <div class="footer-col">
                <a href="{{ route('home') }}" class="footer-logo" title="Voltar para a página inicial do CNPJ Total">
                    <img src="{{ asset('images/logo/logo-branco-vermelho.webp') }}" 
                         alt="Logo CNPJ Total - Consulta de CNPJ Online" 
                         width="160" 
                         height="40">
                </a>
                <p class="footer-description">
                    Plataforma completa para consulta de CNPJ, análise de mercado e prospecção de clientes.
                </p>
            </div>

            {{-- Coluna 2: Navegação --}}
            <div class="footer-col">
                <h4 class="footer-col-title">Navegação</h4>
                <ul>
                    <li><a href="{{ route('home') }}">Início</a></li>
                    <li><a href="#">Sobre Nós</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contato</a></li>
                </ul>
            </div>

            {{-- Coluna 3: Serviços --}}
            <div class="footer-col">
                <h4 class="footer-col-title">Nossos Serviços</h4>
                <ul>
                    <li><a href="{{ route('consultar-cnpj') }}">Consultar CNPJ</a></li>
                    <li><a href="{{ route('consulta-avancada-cnpj') }}">Consulta Avançada</a></li>
                    <li><a href="{{ route('listas-segmentadas') }}">Listas Segmentadas</a></li>
                </ul>
            </div>

            {{-- Coluna 4: Redes Sociais --}}
            <div class="footer-col">
                <h4 class="footer-col-title">Siga-nos</h4>
                <div class="footer-social">
                    <a href="#" target="_blank" rel="nofollow noopener noreferrer" aria-label="Siga-nos no Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#" target="_blank" rel="nofollow noopener noreferrer" aria-label="Siga-nos no Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="#" target="_blank" rel="nofollow noopener noreferrer" aria-label="Siga-nos no LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>

        {{-- Barra Inferior: Copyright e Links Legais --}}
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} CNPJ Total. Todos os direitos reservados.</p>
            <ul>
                <li><a href="#">Termos de Uso</a></li>
                <li><a href="#">Política de Privacidade</a></li>
            </ul>
        </div>
    </div>
</footer>
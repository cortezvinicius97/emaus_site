@extends('layouts.site')

@section('title', 'Política de Privacidade - Grupo de Jovens Emaús')

@section('content')
<header id="header">
    <div class="container nav-container">
        <div class="logo">
            <a href="{{ route('home') }}" style="display:flex;align-items:center;gap:0.5rem;text-decoration:none;">
                <span class="logo-cross">✝</span>
                <span class="logo-text">Jovens Emaús</span>
            </a>
        </div>
        <nav id="nav">
            <ul class="nav-links">
                <li><a href="{{ route('home') }}">Início</a></li>
                <li><a href="{{ route('home') }}#recados">Recados</a></li>
                <li><a href="{{ route('home') }}#eventos">Eventos</a></li>
                <li><a href="{{ route('home') }}#versiculo">Leitura</a></li>
                <li><a href="{{ route('home') }}#galeria">Galeria</a></li>
            </ul>
        </nav>
        <button class="hamburger" id="hamburger" aria-label="Abrir menu">
            <span></span><span></span><span></span>
        </button>
    </div>
</header>

<section id="inicio" class="hero">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <p class="hero-subtitle">Paróquia Nossa Senhora da Guia</p>
        <h1 class="hero-title">Política de Privacidade</h1>
        <p class="hero-verse">Última atualização: junho de 2026</p>
    </div>
    <div class="scroll-indicator" id="scrollDown" style="cursor:pointer;">
        <span></span>
    </div>
</section>

<style>
    .privacy-section {
        padding: 3rem 1.5rem;
        background: var(--branco);
    }
    .privacy-container {
        max-width: 760px;
        margin: 0 auto;
    }
    .privacy-container h2 {
        font-family: var(--font-titulo);
        font-size: 1.2rem;
        color: var(--azul-escuro);
        margin-top: 2rem;
        margin-bottom: 0.75rem;
    }
    .privacy-container p {
        color: var(--cinza-texto);
        line-height: 1.7;
        margin-bottom: 1rem;
    }
    .back-link {
        display: inline-block;
        margin-top: 2rem;
        color: var(--azul-claro);
        text-decoration: none;
        font-weight: 600;
    }
    .back-link:hover {
        text-decoration: underline;
    }
</style>

<section class="privacy-section">
    <div class="privacy-container">
        <p>Esta Política de Privacidade descreve como o <strong>Grupo de Jovens Emaús</strong>, vinculado à Paróquia Nossa Senhora da Guia, coleta, usa e protege as informações pessoais dos visitantes do site, em conformidade com a Lei Geral de Proteção de Dados Pessoais (LGPD – Lei nº 13.709/2018).</p>

        <h2>1. Dados coletados</h2>
        <p>Este site não coleta dados pessoais automaticamente. O único meio de coleta ocorre quando o usuário preenche voluntariamente o formulário de contato, fornecendo nome, e-mail e mensagem.</p>

        <h2>2. Finalidade do uso</h2>
        <p>Os dados fornecidos no formulário de contato são utilizados exclusivamente para responder às solicitações do usuário. Não utilizamos esses dados para nenhuma outra finalidade.</p>

        <h2>3. Armazenamento e compartilhamento</h2>
        <p>Os dados não são armazenados em banco de dados do site (o formulário de contato é apenas ilustrativo). Nenhum dado é compartilhado com terceiros, exceto por obrigação legal.</p>

        <h2>4. Cookies</h2>
        <p>Este site pode utilizar cookies estritamente necessários para o funcionamento técnico da página. Não utilizamos cookies de rastreamento, publicidade ou análise de comportamento.</p>

        <h2>5. Direitos do titular</h2>
        <p>Nos termos da LGPD, você tem direito a:</p>
        <p>— Confirmar a existência de tratamento de seus dados pessoais;<br>
        — Acessar, corrigir ou solicitar a exclusão dos dados;<br>
        — Revogar o consentimento a qualquer momento.</p>

        <h2>6. Contato</h2>
        <p>Para exercer seus direitos ou esclarecer dúvidas sobre esta política, entre em contato diretamente com o grupo através dos canais disponíveis na Paróquia Nossa Senhora da Guia.</p>

        <a href="{{ route('home') }}#inicio" class="back-link">← Voltar ao site</a>
    </div>
</section>

<section id="versiculo" class="versiculo-section">
    <div class="container">
        <div class="section-header" style="margin-bottom:2.5rem;">
            <span class="section-tag">Palavra de Deus</span>
            <h2 class="section-title">Liturgia Diária</h2>
            <div class="divider"></div>
        </div>
        <div class="liturgia-card @if($reading && $reading->cor) cor-{{ strtolower($reading->cor) }} @endif">
            <div class="versiculo-icon">✝</div>
            @if($reading && $reading->liturgia)
                <p style="font-size:0.85rem;color:var(--dourado);margin-bottom:1.5rem;font-weight:600;text-align:center;">{{ $reading->liturgia }}</p>
            @endif
            @if($reading)
                <div class="leitura-wrapper">
                    <div class="leitura-section">
                        <h4 class="leitura-label">Primeira Leitura</h4>
                        @if($reading->first_reading_title)
                            <p class="leitura-title">{{ $reading->first_reading_title }}</p>
                        @endif
                        <blockquote class="versiculo-text">@verses(e($reading->first_reading_text))</blockquote>
                        @if($reading->first_reading_ref)
                            <cite class="versiculo-ref">— {{ $reading->first_reading_ref }}</cite>
                        @endif
                    </div>
                    @if($reading->second_reading_text)
                    <div class="leitura-divider"></div>
                    <div class="leitura-section">
                        <h4 class="leitura-label">Segunda Leitura</h4>
                        @if($reading->second_reading_title)
                            <p class="leitura-title">{{ $reading->second_reading_title }}</p>
                        @endif
                        <blockquote class="versiculo-text">@verses(e($reading->second_reading_text))</blockquote>
                        @if($reading->second_reading_ref)
                            <cite class="versiculo-ref">— {{ $reading->second_reading_ref }}</cite>
                        @endif
                    </div>
                    @endif
                    @if($reading->psalm_text || $reading->psalm_refrao)
                    <div class="leitura-divider"></div>
                    <div class="leitura-section">
                        <h4 class="leitura-label">Salmo de Resposta</h4>
                        @if($reading->psalm_title)
                            <p class="leitura-title">{{ $reading->psalm_title }}</p>
                        @endif
                        @if($reading->psalm_refrao)
                            <p class="leitura-refrao">R: {{ $reading->psalm_refrao }}</p>
                        @endif
                        @if($reading->psalm_verses)
                            <blockquote class="versiculo-text versiculo-salmo">@verses(e($reading->psalm_verses))</blockquote>
                        @elseif($reading->psalm_text)
                            <blockquote class="versiculo-text">@verses(e($reading->psalm_text))</blockquote>
                        @endif
                        @if($reading->psalm_ref)
                            <cite class="versiculo-ref">— {{ $reading->psalm_ref }}</cite>
                        @endif
                    </div>
                    @endif
                    @if($reading->evangelho_text)
                    <div class="leitura-divider"></div>
                    <div class="leitura-section leitura-section-last">
                        <h4 class="leitura-label">Evangelho</h4>
                        @if($reading->evangelho_title)
                            <p class="leitura-title">{{ $reading->evangelho_title }}</p>
                        @endif
                        <blockquote class="versiculo-text">@verses(e($reading->evangelho_text))</blockquote>
                        @if($reading->evangelho_ref)
                            <cite class="versiculo-ref">— {{ $reading->evangelho_ref }}</cite>
                        @endif
                    </div>
                    @endif
                </div>
            @else
                <blockquote class="versiculo-text" style="text-align:center;">
                    "Porque sou eu que conheço os planos que tenho para vocês, diz o Senhor, planos de fazê-los prosperar e não de causar dano, planos de dar a vocês esperança e um futuro."
                </blockquote>
                <cite class="versiculo-ref" style="display:block;text-align:center;">— Jeremias 29,11</cite>
            @endif
        </div>
    </div>
</section>

<footer class="footer">
    <div class="container footer-container">
        <div class="footer-logo">
            <span class="logo-cross">✝</span>
            <span>Jovens Emaús</span>
        </div>
        <p class="footer-verse">"A fé sem obras é morta." — Tiago 2,26</p>
        <p class="footer-copy">© {{ date('Y') }} Grupo de Jovens Emaús · Todos os direitos reservados</p>
        <p style="margin-top:0.5rem;font-size:0.8rem;"><a href="{{ route('privacy') }}" style="color:rgba(255,255,255,0.5);text-decoration:none;">Política de Privacidade</a></p>
    </div>
</footer>
@endsection

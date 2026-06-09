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
</section>

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

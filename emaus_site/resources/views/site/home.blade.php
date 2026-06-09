@extends('layouts.site')

@section('title', 'Grupo de Jovens Emaús | Paróquia NS da Guia')

@section('content')
<header id="header">
    <div class="container nav-container">
        <div class="logo">
            <span class="logo-cross">✝</span>
            <span class="logo-text">Jovens Emaús</span>
        </div>
        <nav id="nav">
            <ul class="nav-links">
                <li><a href="#inicio">Início</a></li>
                <li><a href="#recados">Recados</a></li>
                {{-- <li><a href="#sobre">Sobre</a></li> --}}
                <li><a href="#eventos">Eventos</a></li>
                <li><a href="#versiculo">Leitura</a></li>
                <li><a href="#galeria">Galeria</a></li>
                {{-- <li><a href="#contato">Contato</a></li> --}}
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
        <h1 class="hero-title">Jovens Emaús</h1>
        <p class="hero-verse">"Como os discípulos de Emaús, também nós reconhecemos Cristo quando deixamos que Sua Palavra aqueça o coração e Sua presença se revele na fração do pão."<br><em>— Lucas 24,13-35</em></p>
        {{-- <div class="hero-buttons">
            <a href="#sobre" class="btn btn-primary">Conheça o grupo</a>
            <a href="#contato" class="btn btn-outline">Participe</a>
        </div> --}}
    </div>
    <div class="scroll-indicator" id="scrollDown" style="cursor:pointer;">
        <span></span>
    </div>
</section>

<section id="recados" class="reunioes section">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Comunicados</span>
            <h2 class="section-title">Recados</h2>
            <div class="divider"></div>
        </div>

        @if($groupAnnouncements->isNotEmpty() || $parishAnnouncements->isNotEmpty())
            @if($groupAnnouncements->isNotEmpty())
                <h3 style="font-family:var(--font-titulo);font-size:1.1rem;color:var(--azul-escuro);margin-bottom:1rem;">📢 Recados do Grupo</h3>
                <div style="display:flex;flex-direction:column;gap:1rem;margin-bottom:2.5rem;">
                    @foreach($groupAnnouncements as $a)
                        <div style="background:var(--branco);border-radius:var(--radius);padding:1.25rem 1.5rem;box-shadow:var(--sombra);border-left:4px solid var(--azul-claro);">
                            <h4 style="font-family:var(--font-titulo);font-size:1rem;color:var(--azul-escuro);margin-bottom:0.35rem;">{{ $a->title }}</h4>
                            <div style="font-size:0.9rem;color:var(--cinza-texto);line-height:1.6;">{!! nl2br(e($a->content)) !!}</div>
                        </div>
                    @endforeach
                </div>
            @endif

            @if($parishAnnouncements->isNotEmpty())
                <h3 style="font-family:var(--font-titulo);font-size:1.1rem;color:var(--azul-escuro);margin-bottom:1rem;">⛪ Recados da Paróquia</h3>
                <div style="display:flex;flex-direction:column;gap:1rem;">
                    @foreach($parishAnnouncements as $a)
                        <div style="background:var(--branco);border-radius:var(--radius);padding:1.25rem 1.5rem;box-shadow:var(--sombra);border-left:4px solid var(--dourado);">
                            <h4 style="font-family:var(--font-titulo);font-size:1rem;color:var(--azul-escuro);margin-bottom:0.35rem;">{{ $a->title }}</h4>
                            <div style="font-size:0.9rem;color:var(--cinza-texto);line-height:1.6;">{!! nl2br(e($a->content)) !!}</div>
                        </div>
                    @endforeach
                </div>
            @endif
        @else
            <div style="text-align:center;padding:2rem;color:#94a3b8;">
                <p>Nenhum recado no momento.</p>
            </div>
        @endif
    </div>
</section>

{{-- <section id="sobre" class="sobre section">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Quem somos</span>
            <h2 class="section-title">Sobre o Grupo</h2>
            <div class="divider"></div>
        </div>
        <div class="sobre-grid">
            <div class="sobre-text">
                <p>O <strong>Grupo de Jovens Emaús</strong> é um grupo de jovens católicos com idades entre 15 e 30 anos, unidos pelo amor a Cristo e pela missão de evangelizar e crescer juntos na fé.</p>
                <p>Nos encontramos toda semana para orar, partilhar a Palavra, cantar louvores e servir nossa comunidade com alegria e compromisso.</p>
                <ul class="sobre-list">
                    <li><span class="icon">🙏</span> Oração e adoração ao Santíssimo</li>
                    <li><span class="icon">📖</span> Estudo da Palavra de Deus</li>
                    <li><span class="icon">🎵</span> Louvor e animação litúrgica</li>
                    <li><span class="icon">🤝</span> Serviço e ação social</li>
                    <li><span class="icon">🏕️</span> Retiros e acampamentos</li>
                </ul>
            </div>
            <div class="sobre-cards">
                <div class="card-stat">
                    <span class="stat-number" data-target="120">0</span>
                    <span class="stat-label">Jovens ativos</span>
                </div>
                <div class="card-stat">
                    <span class="stat-number" data-target="8">0</span>
                    <span class="stat-label">Anos de história</span>
                </div>
                <div class="card-stat">
                    <span class="stat-number" data-target="45">0</span>
                    <span class="stat-label">Retiros realizados</span>
                </div>
                <div class="card-stat">
                    <span class="stat-number" data-target="300">0</span>
                    <span class="stat-label">Vidas tocadas</span>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<section class="reunioes section">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Agenda semanal</span>
            <h2 class="section-title">Nossas Reuniões</h2>
            <div class="divider"></div>
        </div>
        <div class="reunioes-grid">
            @forelse($meetings as $meeting)
                <div class="reuniao-card {{ $meeting->is_featured ? 'featured' : '' }}">
                    <div class="reuniao-day">{{ $meeting->day }}</div>
                    <div class="reuniao-info">
                        <h3>{{ $meeting->title }}</h3>
                        <p>{{ $meeting->time ? $meeting->time . ' – ' : '' }}{{ $meeting->location }}</p>
                        @if($meeting->tag)
                            <span class="reuniao-tag">{{ $meeting->tag }}</span>
                        @endif
                    </div>
                </div>
            @empty
                <div style="grid-column:1/-1;text-align:center;padding:2rem;color:#94a3b8;">
                    <p>Nenhuma reunião cadastrada no momento.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<section id="eventos" class="eventos section">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Próximos</span>
            <h2 class="section-title">Eventos</h2>
            <div class="divider"></div>
        </div>
        <div class="eventos-grid">
            @forelse($events as $event)
                <div class="evento-card">
                    <div class="evento-header" style="background: linear-gradient(135deg, {{ $event->color }}, {{ $event->color }}cc);">
                        <span class="evento-date">{{ $event->date->format('d') }}</span>
                        <span class="evento-month">{{ strtoupper($event->date->translatedFormat('M')) }} {{ $event->date->format('Y') }}</span>
                    </div>
                    <div class="evento-body">
                        <h3>{{ $event->title }}</h3>
                        <p>{{ $event->description }}</p>
                        <div class="evento-meta">
                            @if($event->location) <span>📍 {{ $event->location }}</span> @endif
                            @if($event->time) <span>🕗 {{ $event->time }}</span> @endif
                        </div>
                    </div>
                </div>
            @empty
                <div style="grid-column:1/-1;text-align:center;padding:2rem;color:#94a3b8;">
                    <div style="font-size:2rem;margin-bottom:0.5rem;">🎉</div>
                    <p>Nenhum evento agendado no momento.</p>
                </div>
            @endforelse
        </div>
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

<section id="galeria" class="galeria section">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Momentos</span>
            <h2 class="section-title">Galeria</h2>
            <div class="divider"></div>
        </div>
        <div class="galeria-grid">
            @php $colors = ['#1a3a5c', '#2d1b4e', '#1a4a2e', '#4a1a1a', '#3a2a0a', '#0a3a3a']; @endphp
            @forelse($galleries as $gallery)
                @foreach($gallery->photos as $photo)
                    @php $colorIndex = ($loop->parent->index * 10 + $loop->index) % count($colors); @endphp
                    <div class="galeria-item" style="--bg: {{ $colors[$colorIndex] }}">
                        <img src="{{ asset('storage/' . $photo->file_path) }}" alt="{{ $photo->caption ?? $gallery->title }}" style="width:100%;height:100%;object-fit:cover;position:absolute;inset:0;">
                        <div class="galeria-overlay"><span>{{ $photo->caption ?? $gallery->title }}</span></div>
                    </div>
                @endforeach
            @empty
                <div style="grid-column:1/-1;text-align:center;padding:3rem 1rem;color:#94a3b8;">
                    <div style="font-size:3rem;margin-bottom:0.5rem;">📸</div>
                    <p style="font-size:0.95rem;">Não há fotos para exibir</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- <section id="contato" class="contato section">
    <div class="container contato-container">
        <div class="section-header">
            <span class="section-tag">Fale conosco</span>
            <h2 class="section-title">Contato</h2>
            <div class="divider"></div>
        </div>
        <div class="contato-grid">
            <div class="contato-info">
                <h3>Venha fazer parte!</h3>
                <p>Se você tem entre 15 e 30 anos e quer crescer na fé com outros jovens, este grupo é o seu lugar.</p>
                <ul class="contato-list">
                    <li><span>📍</span> Paróquia Nossa Senhora da Guia – Rua da Paz, 123</li>
                    <li><span>📱</span> (11) 99999-0000</li>
                    <li><span>✉️</span> jovensdafe@paroquia.org.br</li>
                    <li><span>📸</span> @jovensdafe</li>
                </ul>
            </div>
            <form class="contato-form" id="contato-form" novalidate>
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" placeholder="Seu nome completo" required>
                    <span class="form-error" id="erro-nome"></span>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="seu@email.com" required>
                    <span class="form-error" id="erro-email"></span>
                </div>
                <div class="form-group">
                    <label for="mensagem">Mensagem</label>
                    <textarea id="mensagem" name="mensagem" rows="4" placeholder="Como podemos ajudar?" required></textarea>
                    <span class="form-error" id="erro-mensagem"></span>
                </div>
                <button type="submit" class="btn btn-primary btn-full">Enviar mensagem</button>
                <p class="form-success" id="form-success"></p>
            </form>
        </div>
    </div>
</section> --}}

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

<a href="#inicio" class="back-to-top" id="back-to-top" aria-label="Voltar ao topo">↑</a>
@endsection

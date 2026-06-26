<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Grupo de Jovens Emaús | Paróquia NS da Guia')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}?v={{ filemtime(public_path('css/site.css')) }}">
    <meta property="og:image" content="{{ asset('og_image.jpg') }}">
    <meta property="og:title" content="@yield('title', 'Grupo de Jovens Emaús | Paróquia NS da Guia')">
    <meta property="og:description" content="Grupo de Jovens Emaús - Paróquia Nossa Senhora da Guia">
    @stack('styles')
</head>
<body>
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>

    <div id="lgpd-banner" style="position:fixed;bottom:0;left:0;right:0;background:rgba(10,22,40,0.95);backdrop-filter:blur(10px);padding:1rem 1.5rem;z-index:9999;display:none;border-top:1px solid rgba(255,255,255,0.1);">
        <div style="max-width:960px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;gap:1rem;flex-wrap:wrap;">
            <p style="color:rgba(255,255,255,0.7);font-size:0.85rem;margin:0;">
                Este site utiliza cookies para melhorar sua experiência. Ao continuar navegando, você aceita nossa
                <a href="{{ route('privacy') }}" style="color:var(--dourado);text-decoration:none;font-weight:600;">Política de Privacidade</a>.
            </p>
            <button onclick="localStorage.setItem('lgpd_accepted','true');this.closest('#lgpd-banner').style.display='none'" style="background:var(--dourado);color:#0a1628;border:none;padding:0.5rem 1.5rem;border-radius:6px;font-weight:700;font-size:0.85rem;cursor:pointer;white-space:nowrap;">
                Aceitar
            </button>
        </div>
    </div>

    @if(config('debug.liturgia'))
        @php
            $dataParam = request('data', now()->format('d/m/Y'));
            $dataUrl = urlencode($dataParam);
        @endphp
        <div id="debug-panel">
            <button id="debug-toggle">🎨</button>
            <div id="debug-content">
                <label>Data (dd/mm/YYYY):</label>
                <input type="text" id="debug-date" value="{{ $dataParam }}" placeholder="dd/mm/YYYY">
                <div style="display:flex;gap:0.35rem;">
                    <button id="debug-go" style="flex:1;">Ir</button>
                    <button id="debug-today" style="background:rgba(255,255,255,0.1);color:#fff;">Hoje</button>
                </div>
            </div>
        </div>
    @endif

    <script src="{{ asset('js/site.js') }}?v={{ filemtime(public_path('js/site.js')) }}"></script>
    <script>
    if (!localStorage.getItem('lgpd_accepted')) {
        document.getElementById('lgpd-banner').style.display = 'block';
    }
    </script>
    @stack('scripts')
</body>
</html>

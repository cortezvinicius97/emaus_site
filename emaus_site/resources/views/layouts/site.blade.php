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
    @stack('styles')
</head>
<body>
    <div id="app">
        @include('layouts.navigation')

        <main>
            @yield('content')
        </main>

        @include('layouts.footer')
    </div>

    @include('layouts.lgpd')

    @if(config('debug.liturgia'))
        @php
            $dataParam = request('data', now()->format('d/m/Y'));
            $dataUrl = urlencode($dataParam);
        @endphp
        <div id="debug-panel">
            <button id="debug-toggle" onclick="toggleDebug()">🎨</button>
            <div id="debug-content" style="display:none;">
                <form method="GET" action="{{ url()->current() }}">
                    <label>Data (dd/mm/YYYY):</label>
                    <input type="text" name="data" value="{{ $dataParam }}" placeholder="dd/mm/YYYY">
                    <button type="submit">Ir</button>
                </form>
            </div>
        </div>
    @endif

    <script src="{{ asset('js/site.js') }}?v={{ filemtime(public_path('js/site.js')) }}"></script>
    @stack('scripts')
</body>
</html>

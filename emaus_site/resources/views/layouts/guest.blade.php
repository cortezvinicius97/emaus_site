<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - Jovens Emaús</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
            position: relative;
            overflow: hidden;
            padding: 1.5rem;
        }
        body::before {
            content: '';
            position: absolute;
            width: 800px;
            height: 800px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(37,99,235,0.08) 0%, transparent 70%);
            top: -300px;
            right: -200px;
        }
        body::after {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(245,158,11,0.05) 0%, transparent 70%);
            bottom: -200px;
            left: -150px;
        }
        .auth-card {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 420px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 25px 80px rgba(0,0,0,0.4);
            padding: 2.5rem 2.5rem 2rem;
            animation: fadeUp 0.5s ease both;
        }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .auth-card-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .auth-card-header .cross {
            font-family: 'Cinzel', serif;
            font-size: 2.2rem;
            color: #f59e0b;
            display: block;
            margin-bottom: 0.75rem;
        }
        .auth-card-header h1 {
            font-size: 1.3rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 0.25rem;
        }
        .auth-card-header p {
            color: #64748b;
            font-size: 0.85rem;
        }
        .form-group {
            margin-bottom: 1.25rem;
        }
        .form-group label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.35rem;
        }
        .input-wrapper {
            position: relative;
        }
        .input-wrapper .input-icon {
            position: absolute;
            left: 0.85rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1rem;
            color: #94a3b8;
            pointer-events: none;
        }
        .form-control {
            width: 100%;
            padding: 0.7rem 0.9rem 0.7rem 2.5rem;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.9rem;
            transition: all 0.2s;
            outline: none;
            font-family: inherit;
            background: #f8fafc;
        }
        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,0.12);
            background: #fff;
        }
        .form-control::placeholder { color: #94a3b8; }
        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }
        .form-options label {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.85rem;
            color: #475569;
            cursor: pointer;
        }
        .form-options input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: #2563eb;
        }
        .form-options a {
            font-size: 0.85rem;
            color: #2563eb;
            text-decoration: none;
            font-weight: 500;
        }
        .form-options a:hover { text-decoration: underline; }
        .btn-login {
            width: 100%;
            padding: 0.75rem;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            font-family: inherit;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37,99,235,0.35);
        }
        .btn-login:active { transform: translateY(0); }
        .auth-footer {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #f1f5f9;
        }
        .auth-footer a {
            color: #94a3b8;
            font-size: 0.85rem;
            text-decoration: none;
            transition: color 0.15s;
        }
        .auth-footer a:hover { color: #2563eb; }
        .alert {
            padding: 0.65rem 0.9rem;
            border-radius: 10px;
            font-size: 0.85rem;
            margin-bottom: 1.5rem;
        }
        .alert-success { background: #dcfce7; color: #166534; border: 1px solid #bbf7d0; }
        .alert-error { background: #fee2e2; color: #991b1b; border: 1px solid #fecaca; }
    </style>
</head>
<body>
    <div class="auth-card">
        <div class="auth-card-header">
            <span class="cross">✝</span>
            <h1>Acessar Painel</h1>
            <p>Faça login para gerenciar o site</p>
        </div>

        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">E-mail</label>
                <div class="input-wrapper">
                    <span class="input-icon">✉</span>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="seu@email.com" required autofocus autocomplete="username">
                </div>
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <div class="input-wrapper">
                    <span class="input-icon">🔒</span>
                    <input id="password" type="password" name="password" class="form-control" placeholder="Sua senha" required autocomplete="current-password">
                </div>
            </div>

            <div class="form-options">
                <label>
                    <input type="checkbox" name="remember">
                    <span>Lembrar-me</span>
                </label>
                @if(Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Esqueceu a senha?</a>
                @endif
            </div>

            <button type="submit" class="btn-login">Entrar</button>

            <div class="auth-footer">
                <a href="{{ route('home') }}">← Voltar ao site</a>
            </div>
        </form>
    </div>
</body>
</html>

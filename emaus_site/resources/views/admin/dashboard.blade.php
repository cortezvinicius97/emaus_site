@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
    <div class="stat-card card" style="border-left: 4px solid #2563eb;">
        <div class="stat-icon" style="background: #dbeafe; color: #2563eb;">🖼️</div>
        <div class="stat-value">{{ $totalGalleries }}</div>
        <div class="stat-label">Galerias</div>
    </div>
    <div class="stat-card card" style="border-left: 4px solid #16a34a;">
        <div class="stat-icon" style="background: #dcfce7; color: #16a34a;">📸</div>
        <div class="stat-value">{{ $totalPhotos }}</div>
        <div class="stat-label">Fotos</div>
    </div>
    <div class="stat-card card" style="border-left: 4px solid #f59e0b;">
        <div class="stat-icon" style="background: #fef3c7; color: #f59e0b;">👥</div>
        <div class="stat-value">{{ \App\Models\User::count() }}</div>
        <div class="stat-label">Usuários</div>
    </div>
    <div class="stat-card card" style="border-left: 4px solid #8b5cf6;">
        <div class="stat-icon" style="background: #ede9fe; color: #8b5cf6;">✅</div>
        <div class="stat-value">{{ \App\Models\Gallery::where('is_active', true)->count() }}</div>
        <div class="stat-label">Galerias Ativas</div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="card">
        <div class="card-header">
            <h3 style="font-size: 1rem; font-weight: 600;">Ações Rápidas</h3>
        </div>
        <div class="card-body" style="display: flex; flex-direction: column; gap: 0.75rem;">
            <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary btn-lg" style="justify-content: center;">
                ➕ Nova Galeria
            </a>
            <a href="{{ route('admin.galleries.index') }}" class="btn btn-outline btn-lg" style="justify-content: center;">
                📂 Gerenciar Galerias
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 style="font-size: 1rem; font-weight: 600;">Informações</h3>
        </div>
        <div class="card-body" style="font-size: 0.875rem; color: #475569;">
            <p style="margin-bottom: 0.75rem;"><strong>Bem-vindo ao painel administrativo</strong> do Grupo de Jovens Emaús.</p>
            <p>Aqui você pode gerenciar as galerias de fotos do site. As galerias ativas aparecem automaticamente na página principal.</p>
            <hr style="margin: 1rem 0; border: none; border-top: 1px solid #e2e8f0;">
            <p style="color: #94a3b8; font-size: 0.8rem;">
                📍 Paróquia Nossa Senhora da Guia
            </p>
        </div>
    </div>
</div>
@endsection

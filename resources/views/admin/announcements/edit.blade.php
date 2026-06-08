@extends('admin.layouts.admin')

@section('title', 'Editar Recado')

@section('content')
<div class="card" style="max-width: 640px;">
    <div class="card-header">
        <h3 style="font-size: 1rem; font-weight: 600;">Editar Recado</h3>
        <a href="{{ route('admin.announcements.index') }}" class="btn btn-outline btn-sm">← Voltar</a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.announcements.update', $announcement) }}" method="POST">
            @csrf @method('PUT')
            <div class="form-group">
                <label>Título</label>
                <input type="text" name="title" value="{{ old('title', $announcement->title) }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Conteúdo</label>
                <textarea name="content" rows="4" class="form-control" required>{{ old('content', $announcement->content) }}</textarea>
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                <div class="form-group">
                    <label>Tipo</label>
                    <select name="type" class="form-control" required>
                        <option value="group" {{ old('type', $announcement->type) == 'group' ? 'selected' : '' }}>Recado do Grupo</option>
                        <option value="parish" {{ old('type', $announcement->type) == 'parish' ? 'selected' : '' }}>Recado da Paróquia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Ordem</label>
                    <input type="number" name="order" value="{{ old('order', $announcement->order) }}" min="0" class="form-control">
                </div>
            </div>
            <div class="form-group" style="margin-bottom:1.5rem;">
                <label style="display:flex;align-items:center;gap:0.5rem;cursor:pointer;">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $announcement->is_active) ? 'checked' : '' }} style="width:18px;height:18px;accent-color:#2563eb;">
                    <span>Ativo</span>
                </label>
            </div>
            <div style="display:flex;gap:0.75rem;">
                <button type="submit" class="btn btn-primary btn-lg">💾 Atualizar</button>
                <a href="{{ route('admin.announcements.index') }}" class="btn btn-outline btn-lg">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection

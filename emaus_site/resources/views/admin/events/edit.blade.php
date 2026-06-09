@extends('admin.layouts.admin')

@section('title', 'Editar Evento')

@section('content')
<div class="card" style="max-width: 640px;">
    <div class="card-header">
        <h3 style="font-size: 1rem; font-weight: 600;">Editar Evento</h3>
        <a href="{{ route('admin.events.index') }}" class="btn btn-outline btn-sm">← Voltar</a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.events.update', $event) }}" method="POST">
            @csrf @method('PUT')
            <div class="form-group">
                <label>Título</label>
                <input type="text" name="title" value="{{ old('title', $event->title) }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Descrição</label>
                <textarea name="description" class="form-control">{{ old('description', $event->description) }}</textarea>
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                <div class="form-group">
                    <label>Data</label>
                    <input type="date" name="date" value="{{ old('date', $event->date->format('Y-m-d')) }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Horário</label>
                    <input type="text" name="time" value="{{ old('time', $event->time) }}" class="form-control">
                </div>
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                <div class="form-group">
                    <label>Local</label>
                    <input type="text" name="location" value="{{ old('location', $event->location) }}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Cor do card</label>
                    <input type="color" name="color" value="{{ old('color', $event->color) }}" class="form-control" style="height:42px;padding:0.25rem;">
                </div>
            </div>
            <div class="form-group">
                <label style="display:flex;align-items:center;gap:0.5rem;cursor:pointer;">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $event->is_active) ? 'checked' : '' }} style="width:18px;height:18px;accent-color:#2563eb;">
                    <span>Ativo</span>
                </label>
            </div>
            <div style="display:flex;gap:0.75rem;">
                <button type="submit" class="btn btn-primary btn-lg">💾 Atualizar</button>
                <a href="{{ route('admin.events.index') }}" class="btn btn-outline btn-lg">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection

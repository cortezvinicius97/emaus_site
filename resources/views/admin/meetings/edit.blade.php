@extends('admin.layouts.admin')

@section('title', 'Editar Reunião')

@section('content')
<div class="card" style="max-width: 640px;">
    <div class="card-header">
        <h3 style="font-size: 1rem; font-weight: 600;">Editar Reunião</h3>
        <a href="{{ route('admin.meetings.index') }}" class="btn btn-outline btn-sm">← Voltar</a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.meetings.update', $meeting) }}" method="POST">
            @csrf @method('PUT')
            <div class="form-group">
                <label>Dia da semana</label>
                <select name="day" class="form-control" required>
                    @foreach(['DOM', 'SEG', 'TER', 'QUA', 'QUI', 'SEX', 'SAB'] as $day)
                        <option value="{{ $day }}" {{ old('day', $meeting->day) == $day ? 'selected' : '' }}>{{ $day }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Título</label>
                <input type="text" name="title" value="{{ old('title', $meeting->title) }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Descrição</label>
                <input type="text" name="description" value="{{ old('description', $meeting->description) }}" class="form-control">
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                <div class="form-group">
                    <label>Horário</label>
                    <input type="text" name="time" value="{{ old('time', $meeting->time) }}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Local</label>
                    <input type="text" name="location" value="{{ old('location', $meeting->location) }}" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label>Tag</label>
                <input type="text" name="tag" value="{{ old('tag', $meeting->tag) }}" class="form-control">
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:1rem;margin-bottom:1.25rem;">
                <label style="display:flex;align-items:center;gap:0.5rem;cursor:pointer;">
                    <input type="hidden" name="is_featured" value="0">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $meeting->is_featured) ? 'checked' : '' }} style="width:18px;height:18px;accent-color:#2563eb;">
                    <span style="font-size:0.85rem;">Destaque</span>
                </label>
                <label style="display:flex;align-items:center;gap:0.5rem;cursor:pointer;">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $meeting->is_active) ? 'checked' : '' }} style="width:18px;height:18px;accent-color:#2563eb;">
                    <span style="font-size:0.85rem;">Ativa</span>
                </label>
                <div class="form-group">
                    <label style="font-size:0.85rem;">Ordem</label>
                    <input type="number" name="order" value="{{ old('order', $meeting->order) }}" min="0" class="form-control" style="max-width:80px;">
                </div>
            </div>
            <div style="display:flex;gap:0.75rem;">
                <button type="submit" class="btn btn-primary btn-lg">💾 Atualizar</button>
                <a href="{{ route('admin.meetings.index') }}" class="btn btn-outline btn-lg">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection

@extends('admin.layouts.admin')

@section('title', 'Nova Reunião')

@section('content')
<div class="card" style="max-width: 640px;">
    <div class="card-header">
        <h3 style="font-size: 1rem; font-weight: 600;">Nova Reunião</h3>
        <a href="{{ route('admin.meetings.index') }}" class="btn btn-outline btn-sm">← Voltar</a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.meetings.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Dia da semana</label>
                <select name="day" class="form-control" required>
                    <option value="">Selecione...</option>
                    @foreach(['DOM', 'SEG', 'TER', 'QUA', 'QUI', 'SEX', 'SAB'] as $day)
                        <option value="{{ $day }}" {{ old('day') == $day ? 'selected' : '' }}>{{ $day }}</option>
                    @endforeach
                </select>
                @error('day') <span style="color:#dc2626;font-size:0.8rem;">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label>Título</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control" required>
                @error('title') <span style="color:#dc2626;font-size:0.8rem;">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label>Descrição</label>
                <input type="text" name="description" value="{{ old('description') }}" class="form-control">
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                <div class="form-group">
                    <label>Horário</label>
                    <input type="text" name="time" value="{{ old('time') }}" class="form-control" placeholder="19h30">
                </div>
                <div class="form-group">
                    <label>Local</label>
                    <input type="text" name="location" value="{{ old('location') }}" class="form-control" placeholder="Salão Paroquial">
                </div>
            </div>
            <div class="form-group">
                <label>Tag</label>
                <input type="text" name="tag" value="{{ old('tag') }}" class="form-control" placeholder="Aberto a todos">
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:1rem;margin-bottom:1.25rem;">
                <label style="display:flex;align-items:center;gap:0.5rem;cursor:pointer;">
                    <input type="hidden" name="is_featured" value="0">
                    <input type="checkbox" name="is_featured" value="1" style="width:18px;height:18px;accent-color:#2563eb;">
                    <span style="font-size:0.85rem;">Destaque</span>
                </label>
                <label style="display:flex;align-items:center;gap:0.5rem;cursor:pointer;">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" checked style="width:18px;height:18px;accent-color:#2563eb;">
                    <span style="font-size:0.85rem;">Ativa</span>
                </label>
                <div class="form-group">
                    <label style="font-size:0.85rem;">Ordem</label>
                    <input type="number" name="order" value="{{ old('order', 0) }}" min="0" class="form-control" style="max-width:80px;">
                </div>
            </div>
            <div style="display:flex;gap:0.75rem;">
                <button type="submit" class="btn btn-primary btn-lg">💾 Salvar</button>
                <a href="{{ route('admin.meetings.index') }}" class="btn btn-outline btn-lg">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection

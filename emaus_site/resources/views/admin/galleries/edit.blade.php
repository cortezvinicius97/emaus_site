@extends('admin.layouts.admin')

@section('title', 'Editar Galeria')

@section('content')
<div class="card" style="max-width: 640px;">
    <div class="card-header">
        <h3 style="font-size: 1rem; font-weight: 600;">Editar: {{ $gallery->title }}</h3>
        <a href="{{ route('admin.galleries.index') }}" class="btn btn-outline btn-sm">← Voltar</a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST">
            @csrf @method('PUT')

            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" id="title" name="title" value="{{ old('title', $gallery->title) }}" class="form-control" required>
                @error('title') <span style="color: #dc2626; font-size: 0.8rem;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea id="description" name="description" class="form-control">{{ old('description', $gallery->description) }}</textarea>
                @error('description') <span style="color: #dc2626; font-size: 0.8rem;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $gallery->is_active) ? 'checked' : '' }} style="width: 18px; height: 18px; accent-color: #2563eb;">
                    <span>Galeria ativa (aparece no site)</span>
                </label>
            </div>

            <div style="display: flex; gap: 0.75rem; padding-top: 0.5rem;">
                <button type="submit" class="btn btn-primary btn-lg">💾 Atualizar</button>
                <a href="{{ route('admin.galleries.index') }}" class="btn btn-outline btn-lg">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection

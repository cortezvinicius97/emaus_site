@extends('admin.layouts.admin')

@section('title', 'Editar Foto')

@section('content')
<div class="card" style="max-width: 640px;">
    <div class="card-header">
        <h3 style="font-size: 1rem; font-weight: 600;">Editar Foto</h3>
        <a href="{{ route('admin.galleries.photos.index', $gallery) }}" class="btn btn-outline btn-sm">← Voltar</a>
    </div>
    <div class="card-body">
        <div style="margin-bottom: 1.5rem; border-radius: 10px; overflow: hidden; max-width: 300px;">
            <img src="{{ asset('storage/' . $photo->file_path) }}" alt="{{ $photo->caption }}" style="width: 100%; height: 200px; object-fit: cover; display: block;">
        </div>

        <form action="{{ route('admin.galleries.photos.update', [$gallery, $photo]) }}" method="POST">
            @csrf @method('PUT')

            <div class="form-group">
                <label for="caption">Legenda</label>
                <input type="text" id="caption" name="caption" value="{{ old('caption', $photo->caption) }}" class="form-control" placeholder="Ex: Momento de oração no retiro">
                @error('caption') <span style="color: #dc2626; font-size: 0.8rem;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="order">Ordem de exibição</label>
                <input type="number" id="order" name="order" value="{{ old('order', $photo->order) }}" min="0" class="form-control" style="max-width: 120px;">
                <p style="font-size: 0.8rem; color: #94a3b8; margin-top: 0.25rem;">Números menores aparecem primeiro</p>
                @error('order') <span style="color: #dc2626; font-size: 0.8rem;">{{ $message }}</span> @enderror
            </div>

            <div style="display: flex; gap: 0.75rem; padding-top: 0.5rem;">
                <button type="submit" class="btn btn-primary btn-lg">💾 Salvar</button>
                <a href="{{ route('admin.galleries.photos.index', $gallery) }}" class="btn btn-outline btn-lg">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection

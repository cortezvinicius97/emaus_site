@extends('admin.layouts.admin')

@section('title', 'Upload Fotos - ' . $gallery->title)

@section('content')
<div class="card" style="max-width: 640px;">
    <div class="card-header">
        <h3 style="font-size: 1rem; font-weight: 600;">Upload de Fotos</h3>
        <a href="{{ route('admin.galleries.photos.index', $gallery) }}" class="btn btn-outline btn-sm">← Voltar</a>
    </div>
    <div class="card-body">
        <p style="font-size: 0.9rem; color: #475569; margin-bottom: 1.5rem;">
            Galeria: <strong>{{ $gallery->title }}</strong>
        </p>

        <form action="{{ route('admin.galleries.photos.store', $gallery) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="photos">Selecionar Fotos</label>
                <input type="file" id="photos" name="photos[]" multiple accept="image/jpeg,image/png,image/jpg,image/webp" class="form-control" style="padding: 0.5rem;" required>
                <p style="font-size: 0.8rem; color: #94a3b8; margin-top: 0.35rem;">
                    Formatos: JPG, PNG, WebP • Máx: 2MB por foto • Múltiplas fotos permitidas
                </p>
                @error('photos') <span style="color: #dc2626; font-size: 0.8rem;">{{ $message }}</span> @enderror
                @error('photos.*') <span style="color: #dc2626; font-size: 0.8rem;">{{ $message }}</span> @enderror
            </div>

            <div style="display: flex; gap: 0.75rem; padding-top: 0.5rem;">
                <button type="submit" class="btn btn-primary btn-lg">📤 Enviar</button>
                <a href="{{ route('admin.galleries.photos.index', $gallery) }}" class="btn btn-outline btn-lg">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection

@extends('admin.layouts.admin')

@section('title', 'Fotos - ' . $gallery->title)

@section('content')
<div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 0.75rem;">
    <div>
        <a href="{{ route('admin.galleries.index') }}" style="color: #64748b; text-decoration: none; font-size: 0.85rem;">← Galerias</a>
        <h3 style="font-size: 1.2rem; font-weight: 600; margin-top: 0.25rem;">{{ $gallery->title }}</h3>
        @if($gallery->description)
            <p style="color: #64748b; font-size: 0.85rem;">{{ $gallery->description }}</p>
        @endif
    </div>
    <a href="{{ route('admin.galleries.photos.create', $gallery) }}" class="btn btn-primary">📤 Upload Fotos</a>
</div>

<div class="card">
    <div class="card-header">
        <h3 style="font-size: 1rem; font-weight: 600;">Fotos ({{ $photos->count() }})</h3>
    </div>
    <div class="card-body">
        @if($photos->count() > 0)
            <div class="photo-grid">
                @foreach($photos as $photo)
                    <div class="photo-card">
                        <img src="{{ asset('storage/' . $photo->file_path) }}" alt="{{ $photo->caption ?? 'Foto' }}">
                        <div class="photo-actions">
                            <a href="{{ route('admin.galleries.photos.edit', [$gallery, $photo]) }}" class="btn btn-warning btn-sm" style="padding: 0.35rem 0.6rem; font-size: 0.7rem;">✏️</a>
                            <form action="{{ route('admin.galleries.photos.destroy', [$gallery, $photo]) }}" method="POST" onsubmit="return confirm('Excluir esta foto?')" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" style="padding: 0.35rem 0.6rem; font-size: 0.7rem;">🗑️</button>
                            </form>
                        </div>
                        @if($photo->caption)
                            <p style="padding: 0.4rem 0.5rem; font-size: 0.75rem; color: #475569; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $photo->caption }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div style="text-align: center; padding: 3rem 1rem; color: #94a3b8;">
                <div style="font-size: 3rem; margin-bottom: 0.5rem;">📸</div>
                <p style="font-size: 0.95rem;">Nenhuma foto nesta galeria</p>
                <a href="{{ route('admin.galleries.photos.create', $gallery) }}" class="btn btn-primary" style="margin-top: 1rem;">Enviar fotos</a>
            </div>
        @endif
    </div>
</div>
@endsection

@extends('admin.layouts.admin')

@section('title', 'Galerias')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 style="font-size: 1rem; font-weight: 600;">Todas as Galerias</h3>
        <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">➕ Nova Galeria</a>
    </div>
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Fotos</th>
                    <th>Status</th>
                    <th style="text-align: right;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($galleries as $gallery)
                    <tr>
                        <td style="font-weight: 600;">{{ $gallery->title }}</td>
                        <td style="color: #64748b; max-width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            {{ $gallery->description ?? '—' }}
                        </td>
                        <td>
                            <span class="badge badge-info">{{ $gallery->photos_count }}</span>
                        </td>
                        <td>
                            <span class="badge {{ $gallery->is_active ? 'badge-success' : 'badge-danger' }}">
                                {{ $gallery->is_active ? 'Ativa' : 'Inativa' }}
                            </span>
                        </td>
                        <td style="text-align: right;">
                            <div style="display: flex; gap: 0.5rem; justify-content: flex-end;">
                                <a href="{{ route('admin.galleries.photos.index', $gallery) }}" class="btn btn-success btn-sm">📸 Fotos</a>
                                <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-warning btn-sm">✏️ Editar</a>
                                <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta galeria? Todas as fotos serão removidas.')" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">🗑️ Excluir</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 3rem 1rem; color: #94a3b8;">
                            <div style="font-size: 3rem; margin-bottom: 0.5rem;">🖼️</div>
                            <p style="font-size: 0.95rem;">Nenhuma galeria encontrada</p>
                            <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary" style="margin-top: 1rem;">Criar primeira galeria</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

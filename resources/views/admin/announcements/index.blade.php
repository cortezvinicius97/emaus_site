@extends('admin.layouts.admin')

@section('title', 'Recados')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 style="font-size: 1rem; font-weight: 600;">Todos os Recados</h3>
        <a href="{{ route('admin.announcements.create') }}" class="btn btn-primary">➕ Novo Recado</a>
    </div>
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Tipo</th>
                    <th>Ordem</th>
                    <th>Ativo</th>
                    <th style="text-align: right;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($announcements as $announcement)
                    <tr>
                        <td style="font-weight: 600;">{{ $announcement->title }}</td>
                        <td>
                            <span class="badge {{ $announcement->type == 'group' ? 'badge-success' : 'badge-info' }}">
                                {{ $announcement->type == 'group' ? 'Grupo' : 'Paróquia' }}
                            </span>
                        </td>
                        <td>{{ $announcement->order }}</td>
                        <td>
                            <span class="badge {{ $announcement->is_active ? 'badge-success' : 'badge-danger' }}">
                                {{ $announcement->is_active ? 'Sim' : 'Não' }}
                            </span>
                        </td>
                        <td style="text-align: right;">
                            <div style="display: flex; gap: 0.5rem; justify-content: flex-end;">
                                <a href="{{ route('admin.announcements.edit', $announcement) }}" class="btn btn-warning btn-sm">✏️ Editar</a>
                                <form action="{{ route('admin.announcements.destroy', $announcement) }}" method="POST" onsubmit="return confirm('Excluir este recado?')" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">🗑️</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align:center;padding:3rem 1rem;color:#94a3b8;">
                            <div style="font-size:3rem;margin-bottom:0.5rem;">📢</div>
                            <p>Nenhum recado cadastrado</p>
                            <a href="{{ route('admin.announcements.create') }}" class="btn btn-primary" style="margin-top:1rem;">Criar recado</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

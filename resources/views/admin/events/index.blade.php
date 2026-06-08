@extends('admin.layouts.admin')

@section('title', 'Eventos')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 style="font-size: 1rem; font-weight: 600;">Todos os Eventos</h3>
        <a href="{{ route('admin.events.create') }}" class="btn btn-primary">➕ Novo Evento</a>
    </div>
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Título</th>
                    <th>Horário</th>
                    <th>Local</th>
                    <th>Ativo</th>
                    <th style="text-align: right;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($events as $event)
                    <tr>
                        <td>
                            <div style="display:flex;align-items:center;gap:0.5rem;">
                                <span style="display:inline-block;width:12px;height:12px;border-radius:4px;background:{{ $event->color }};"></span>
                                {{ $event->date->format('d/m/Y') }}
                            </div>
                        </td>
                        <td style="font-weight: 600;">{{ $event->title }}</td>
                        <td>{{ $event->time ?? '—' }}</td>
                        <td style="color: #64748b;">{{ $event->location ?? '—' }}</td>
                        <td>
                            <span class="badge {{ $event->is_active ? 'badge-success' : 'badge-danger' }}">
                                {{ $event->is_active ? 'Sim' : 'Não' }}
                            </span>
                        </td>
                        <td style="text-align: right;">
                            <div style="display: flex; gap: 0.5rem; justify-content: flex-end;">
                                <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-warning btn-sm">✏️ Editar</a>
                                <form action="{{ route('admin.events.destroy', $event) }}" method="POST" onsubmit="return confirm('Excluir este evento?')" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">🗑️</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align:center;padding:3rem 1rem;color:#94a3b8;">
                            <div style="font-size:3rem;margin-bottom:0.5rem;">🎉</div>
                            <p>Nenhum evento cadastrado</p>
                            <a href="{{ route('admin.events.create') }}" class="btn btn-primary" style="margin-top:1rem;">Criar evento</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

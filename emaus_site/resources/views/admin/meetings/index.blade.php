@extends('admin.layouts.admin')

@section('title', 'Reuniões')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 style="font-size: 1rem; font-weight: 600;">Todas as Reuniões</h3>
        <a href="{{ route('admin.meetings.create') }}" class="btn btn-primary">➕ Nova Reunião</a>
    </div>
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>Dia</th>
                    <th>Título</th>
                    <th>Horário</th>
                    <th>Local</th>
                    <th>Destaque</th>
                    <th>Ativo</th>
                    <th>Ordem</th>
                    <th style="text-align: right;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($meetings as $meeting)
                    <tr>
                        <td><span class="badge badge-info">{{ $meeting->day }}</span></td>
                        <td style="font-weight: 600;">{{ $meeting->title }}</td>
                        <td>{{ $meeting->time ?? '—' }}</td>
                        <td style="color: #64748b;">{{ $meeting->location ?? '—' }}</td>
                        <td>
                            @if($meeting->is_featured)
                                <span class="badge badge-success">Sim</span>
                            @else
                                <span style="color:#94a3b8;">—</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge {{ $meeting->is_active ? 'badge-success' : 'badge-danger' }}">
                                {{ $meeting->is_active ? 'Sim' : 'Não' }}
                            </span>
                        </td>
                        <td>{{ $meeting->order }}</td>
                        <td style="text-align: right;">
                            <div style="display: flex; gap: 0.5rem; justify-content: flex-end;">
                                <a href="{{ route('admin.meetings.edit', $meeting) }}" class="btn btn-warning btn-sm">✏️ Editar</a>
                                <form action="{{ route('admin.meetings.destroy', $meeting) }}" method="POST" onsubmit="return confirm('Excluir esta reunião?')" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">🗑️</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" style="text-align:center;padding:3rem 1rem;color:#94a3b8;">
                            <div style="font-size:3rem;margin-bottom:0.5rem;">📅</div>
                            <p>Nenhuma reunião cadastrada</p>
                            <a href="{{ route('admin.meetings.create') }}" class="btn btn-primary" style="margin-top:1rem;">Criar reunião</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

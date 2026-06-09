@extends('admin.layouts.admin')

@section('title', 'Leitura do Dia')

@section('content')
<style>
.verse-num { color:#2563eb; font-weight:700; margin-right:0.15em; }
</style>
<div class="card" style="max-width: 720px;">
    <div class="card-header">
        <h3 style="font-size: 1rem; font-weight: 600;">Leitura do Dia</h3>
    </div>
    <div class="card-body">
        @if($reading)
            <p style="font-size:0.85rem;color:#64748b;margin-bottom:1.5rem;">
                Leitura de hoje (<strong>{{ now()->format('d/m/Y') }}</strong>) carregada automaticamente do calendário litúrgico.
            </p>
            <div style="display:flex;gap:0.75rem;align-items:center;margin-bottom:1.5rem;">
                <span style="background:#f1f5f9;padding:0.35rem 0.75rem;border-radius:6px;font-size:0.8rem;font-weight:600;">{{ $reading->liturgia ?? 'Celebração' }}</span>
                <span style="display:inline-flex;align-items:center;gap:0.35rem;background:#f1f5f9;padding:0.35rem 0.75rem;border-radius:6px;font-size:0.8rem;font-weight:600;">
                    <span style="display:inline-block;width:12px;height:12px;border-radius:50%;background:{{ $reading->cor === 'Branco' ? '#f0f0f0' : ($reading->cor === 'Verde' ? '#22c55e' : ($reading->cor === 'Vermelho' ? '#ef4444' : ($reading->cor === 'Roxo' ? '#a855f7' : '#f0f0f0'))) }};border:1px solid #e2e8f0;"></span>
                    {{ $reading->cor ?? '—' }}
                </span>
            </div>

            <div style="background:#f8fafc;border-radius:8px;padding:1.25rem;margin-bottom:1.5rem;border:1px solid #e2e8f0;">
                <h4 style="font-size:0.9rem;font-weight:600;color:#0f172a;margin-bottom:0.75rem;">📖 Primeira Leitura</h4>
                @if($reading->first_reading_title)
                    <p style="font-size:0.85rem;font-weight:600;color:#2563eb;margin-bottom:0.25rem;">{{ $reading->first_reading_title }}</p>
                @endif
                <p style="font-size:0.85rem;color:#475569;line-height:1.6;margin-bottom:0.25rem;">@verses(e($reading->first_reading_text))</p>
                @if($reading->first_reading_ref)
                    <p style="font-size:0.8rem;color:#94a3b8;">— {{ $reading->first_reading_ref }}</p>
                @endif
            </div>

            @if($reading->second_reading_text)
            <div style="background:#f8fafc;border-radius:8px;padding:1.25rem;margin-bottom:1.5rem;border:1px solid #e2e8f0;">
                <h4 style="font-size:0.9rem;font-weight:600;color:#0f172a;margin-bottom:0.75rem;">📖 Segunda Leitura</h4>
                @if($reading->second_reading_title)
                    <p style="font-size:0.85rem;font-weight:600;color:#2563eb;margin-bottom:0.25rem;">{{ $reading->second_reading_title }}</p>
                @endif
                <p style="font-size:0.85rem;color:#475569;line-height:1.6;margin-bottom:0.25rem;">@verses(e($reading->second_reading_text))</p>
                @if($reading->second_reading_ref)
                    <p style="font-size:0.8rem;color:#94a3b8;">— {{ $reading->second_reading_ref }}</p>
                @endif
            </div>
            @endif

            <div style="background:#f8fafc;border-radius:8px;padding:1.25rem;margin-bottom:1.5rem;border:1px solid #e2e8f0;">
                <h4 style="font-size:0.9rem;font-weight:600;color:#0f172a;margin-bottom:0.75rem;">🎵 Salmo de Resposta</h4>
                @if($reading->psalm_title)
                    <p style="font-size:0.85rem;font-weight:600;color:#2563eb;margin-bottom:0.25rem;">{{ $reading->psalm_title }}</p>
                @endif
                <p style="font-size:0.85rem;color:#475569;line-height:1.6;margin-bottom:0.25rem;">@verses(e($reading->psalm_text))</p>
                @if($reading->psalm_ref)
                    <p style="font-size:0.8rem;color:#94a3b8;">— {{ $reading->psalm_ref }}</p>
                @endif
            </div>

            <div style="background:#f8fafc;border-radius:8px;padding:1.25rem;margin-bottom:1.5rem;border:1px solid #e2e8f0;">
                <h4 style="font-size:0.9rem;font-weight:600;color:#0f172a;margin-bottom:0.75rem;">📖 Evangelho</h4>
                @if($reading->evangelho_title)
                    <p style="font-size:0.85rem;font-weight:600;color:#2563eb;margin-bottom:0.25rem;">{{ $reading->evangelho_title }}</p>
                @endif
                <p style="font-size:0.85rem;color:#475569;line-height:1.6;margin-bottom:0.25rem;">@verses(e($reading->evangelho_text))</p>
                @if($reading->evangelho_ref)
                    <p style="font-size:0.8rem;color:#94a3b8;">— {{ $reading->evangelho_ref }}</p>
                @endif
            </div>
        @else
            <div style="text-align:center;padding:2rem;color:#94a3b8;">
                <p>Nenhuma leitura disponível para hoje.</p>
            </div>
        @endif
    </div>
</div>
@endsection

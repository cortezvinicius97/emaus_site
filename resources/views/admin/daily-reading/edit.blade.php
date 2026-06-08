@extends('admin.layouts.admin')

@section('title', 'Leitura do Dia')

@section('content')
<div class="card" style="max-width: 720px;">
    <div class="card-header">
        <h3 style="font-size: 1rem; font-weight: 600;">Leitura do Dia</h3>
    </div>
    <div class="card-body">
        <p style="font-size:0.85rem;color:#64748b;margin-bottom:1.5rem;">
            Esta é a leitura fixa exibida na seção "Leitura do Dia" do site. Apenas um registro é utilizado.
        </p>

        <form action="{{ route('admin.daily-reading.update') }}" method="POST">
            @csrf @method('PUT')

            <div style="background:#f8fafc;border-radius:8px;padding:1.25rem;margin-bottom:1.5rem;border:1px solid #e2e8f0;">
                <h4 style="font-size:0.9rem;font-weight:600;color:#0f172a;margin-bottom:1rem;">📖 Primeira Leitura</h4>
                <div class="form-group">
                    <label for="first_reading_text">Texto</label>
                    <textarea id="first_reading_text" name="first_reading_text" rows="3" class="form-control" required>{{ old('first_reading_text', $reading->first_reading_text) }}</textarea>
                    @error('first_reading_text') <span style="color:#dc2626;font-size:0.8rem;">{{ $message }}</span> @enderror
                </div>
                <div class="form-group" style="margin-bottom:0;">
                    <label for="first_reading_ref">Referência</label>
                    <input type="text" id="first_reading_ref" name="first_reading_ref" value="{{ old('first_reading_ref', $reading->first_reading_ref) }}" class="form-control" placeholder="Ex: Jeremias 29,11">
                    @error('first_reading_ref') <span style="color:#dc2626;font-size:0.8rem;">{{ $message }}</span> @enderror
                </div>
            </div>

            <div style="background:#f8fafc;border-radius:8px;padding:1.25rem;margin-bottom:1.5rem;border:1px solid #e2e8f0;">
                <h4 style="font-size:0.9rem;font-weight:600;color:#0f172a;margin-bottom:1rem;">📖 Segunda Leitura</h4>
                <div class="form-group">
                    <label for="second_reading_text">Texto</label>
                    <textarea id="second_reading_text" name="second_reading_text" rows="3" class="form-control" placeholder="Opcional - apenas para domingos e ocasiões especiais">{{ old('second_reading_text', $reading->second_reading_text) }}</textarea>
                    @error('second_reading_text') <span style="color:#dc2626;font-size:0.8rem;">{{ $message }}</span> @enderror
                </div>
                <div class="form-group" style="margin-bottom:0;">
                    <label for="second_reading_ref">Referência</label>
                    <input type="text" id="second_reading_ref" name="second_reading_ref" value="{{ old('second_reading_ref', $reading->second_reading_ref) }}" class="form-control" placeholder="Ex: 1 Timóteo 4,12">
                    @error('second_reading_ref') <span style="color:#dc2626;font-size:0.8rem;">{{ $message }}</span> @enderror
                </div>
            </div>

            <div style="display:flex;gap:0.75rem;">
                <button type="submit" class="btn btn-primary btn-lg">💾 Salvar</button>
            </div>
        </form>
    </div>
</div>
@endsection

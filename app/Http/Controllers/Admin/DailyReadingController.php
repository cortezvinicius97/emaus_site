<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DailyReading;
use Illuminate\Http\Request;

class DailyReadingController extends Controller
{
    public function edit()
    {
        $reading = DailyReading::firstOrCreate(
            ['id' => 1],
            [
                'first_reading_text' => '"Porque sou eu que conheço os planos que tenho para vocês, diz o Senhor, planos de fazê-los prosperar e não de causar dano, planos de dar a vocês esperança e um futuro."',
                'first_reading_ref' => 'Jeremias 29,11',
                'second_reading_text' => '"Não deixeis que alguém vos despreze por serdes jovens. Pelo contrário, sede modelo para os fiéis."',
                'second_reading_ref' => '1 Timóteo 4,12',
            ]
        );
        return view('admin.daily-reading.edit', compact('reading'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'first_reading_text' => 'required|string',
            'first_reading_ref' => 'nullable|string|max:255',
            'second_reading_text' => 'nullable|string',
            'second_reading_ref' => 'nullable|string|max:255',
        ]);

        $reading = DailyReading::firstOrCreate(
            ['id' => 1],
            [
                'first_reading_text' => '"Porque sou eu que conheço os planos que tenho para vocês, diz o Senhor, planos de fazê-los prosperar e não de causar dano, planos de dar a vocês esperança e um futuro."',
                'first_reading_ref' => 'Jeremias 29,11',
                'second_reading_text' => '"Não deixeis que alguém vos despreze por serdes jovens. Pelo contrário, sede modelo para os fiéis."',
                'second_reading_ref' => '1 Timóteo 4,12',
            ]
        );
        $reading->update($validated);

        return redirect()->route('admin.daily-reading.edit')
            ->with('success', 'Leitura do dia atualizada com sucesso!');
    }
}

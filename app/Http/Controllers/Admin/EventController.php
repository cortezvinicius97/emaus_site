<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('date')->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'time' => 'nullable|string|max:50',
            'location' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:20',
            'is_active' => 'boolean',
        ]);

        Event::create($validated);

        return redirect()->route('admin.events.index')
            ->with('success', 'Evento criado com sucesso!');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'time' => 'nullable|string|max:50',
            'location' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:20',
            'is_active' => 'boolean',
        ]);

        $event->update($validated);

        return redirect()->route('admin.events.index')
            ->with('success', 'Evento atualizado com sucesso!');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')
            ->with('success', 'Evento excluído com sucesso!');
    }
}

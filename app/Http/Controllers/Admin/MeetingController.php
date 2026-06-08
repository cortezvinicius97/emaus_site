<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function index()
    {
        $meetings = Meeting::orderBy('order')->get();
        return view('admin.meetings.index', compact('meetings'));
    }

    public function create()
    {
        return view('admin.meetings.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'day' => 'required|string|max:10',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'time' => 'nullable|string|max:50',
            'location' => 'nullable|string|max:255',
            'tag' => 'nullable|string|max:100',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        Meeting::create($validated);

        return redirect()->route('admin.meetings.index')
            ->with('success', 'Reunião criada com sucesso!');
    }

    public function edit(Meeting $meeting)
    {
        return view('admin.meetings.edit', compact('meeting'));
    }

    public function update(Request $request, Meeting $meeting)
    {
        $validated = $request->validate([
            'day' => 'required|string|max:10',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'time' => 'nullable|string|max:50',
            'location' => 'nullable|string|max:255',
            'tag' => 'nullable|string|max:100',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        $meeting->update($validated);

        return redirect()->route('admin.meetings.index')
            ->with('success', 'Reunião atualizada com sucesso!');
    }

    public function destroy(Meeting $meeting)
    {
        $meeting->delete();
        return redirect()->route('admin.meetings.index')
            ->with('success', 'Reunião excluída com sucesso!');
    }
}

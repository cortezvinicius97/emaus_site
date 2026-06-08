<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function index(Gallery $gallery)
    {
        $photos = $gallery->photos()->orderBy('order')->get();
        return view('admin.photos.index', compact('gallery', 'photos'));
    }

    public function create(Gallery $gallery)
    {
        return view('admin.photos.create', compact('gallery'));
    }

    public function store(Request $request, Gallery $gallery)
    {
        $request->validate([
            'photos' => 'required|array',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'captions' => 'nullable|array',
            'captions.*' => 'nullable|string|max:255',
        ]);

        foreach ($request->file('photos') as $index => $file) {
            $path = $file->store('galleries/' . $gallery->id, 'public');

            Photo::create([
                'gallery_id' => $gallery->id,
                'file_path' => $path,
                'caption' => $request->captions[$index] ?? null,
                'order' => $gallery->photos()->count() + $index + 1,
            ]);
        }

        return redirect()->route('admin.galleries.photos.index', $gallery)
            ->with('success', 'Fotos enviadas com sucesso!');
    }

    public function edit(Gallery $gallery, Photo $photo)
    {
        return view('admin.photos.edit', compact('gallery', 'photo'));
    }

    public function update(Request $request, Gallery $gallery, Photo $photo)
    {
        $request->validate([
            'caption' => 'nullable|string|max:255',
            'order' => 'integer|min:0',
        ]);

        $photo->update($request->only('caption', 'order'));

        return redirect()->route('admin.galleries.photos.index', $gallery)
            ->with('success', 'Foto atualizada com sucesso!');
    }

    public function destroy(Gallery $gallery, Photo $photo)
    {
        Storage::disk('public')->delete($photo->file_path);
        $photo->delete();

        return redirect()->route('admin.galleries.photos.index', $gallery)
            ->with('success', 'Foto excluída com sucesso!');
    }
}

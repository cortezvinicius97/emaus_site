<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Photo;

class DashboardController extends Controller
{
    public function index()
    {
        $totalGalleries = Gallery::count();
        $totalPhotos = Photo::count();
        return view('admin.dashboard', compact('totalGalleries', 'totalPhotos'));
    }
}

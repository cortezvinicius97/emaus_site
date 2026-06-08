<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\DailyReading;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Meeting;

class SiteController extends Controller
{
    public function index()
    {
        $galleries = Gallery::where('is_active', true)->with('photos')->get();
        $meetings = Meeting::where('is_active', true)->orderBy('order')->get();
        $events = Event::where('is_active', true)->whereDate('date', '>=', now())->orderBy('date')->get();
        $reading = DailyReading::first();
        $groupAnnouncements = Announcement::where('is_active', true)->where('type', 'group')->orderBy('order')->get();
        $parishAnnouncements = Announcement::where('is_active', true)->where('type', 'parish')->orderBy('order')->get();

        return view('site.home', compact('galleries', 'meetings', 'events', 'reading', 'groupAnnouncements', 'parishAnnouncements'));
    }
}

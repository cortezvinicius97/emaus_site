<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Meeting;
use App\Services\LiturgiaService;

class SiteController extends Controller
{
    private function getReading()
    {
        $service = app(LiturgiaService::class);

        if (config('debug.liturgia') && $data = request('data')) {
            if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $data)) {
                $parts = explode('-', $data);
                $data = $parts[2] . '/' . $parts[1] . '/' . $parts[0];
            }
            return $service->find($data);
        }

        return $service->today();
    }

    public function index()
    {
        $galleries = Gallery::where('is_active', true)->with('photos')->get();
        $meetings = Meeting::where('is_active', true)->orderBy('order')->get();
        $events = Event::where('is_active', true)->whereDate('date', '>=', now())->orderBy('date')->get();
        $reading = $this->getReading();
        $groupAnnouncements = Announcement::where('is_active', true)->where('type', 'group')->orderBy('order')->get();
        $parishAnnouncements = Announcement::where('is_active', true)->where('type', 'parish')->orderBy('order')->get();

        return view('site.home', compact('galleries', 'meetings', 'events', 'reading', 'groupAnnouncements', 'parishAnnouncements'));
    }

    public function privacy()
    {
        $reading = $this->getReading();
        return view('site.privacy', compact('reading'));
    }
}

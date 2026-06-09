<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\LiturgiaService;

class DailyReadingController extends Controller
{
    public function edit()
    {
        $reading = app(LiturgiaService::class)->today();
        return view('admin.daily-reading.edit', compact('reading'));
    }
}

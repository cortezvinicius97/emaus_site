<?php

use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\DailyReadingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MeetingController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/privacidade', [SiteController::class, 'privacy'])->name('privacy');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('galleries', GalleryController::class)->names([
        'index' => 'galleries.index',
        'create' => 'galleries.create',
        'store' => 'galleries.store',
        'edit' => 'galleries.edit',
        'update' => 'galleries.update',
        'destroy' => 'galleries.destroy',
    ]);

    Route::prefix('galleries/{gallery}/photos')->name('galleries.photos.')->group(function () {
        Route::get('/', [PhotoController::class, 'index'])->name('index');
        Route::get('/create', [PhotoController::class, 'create'])->name('create');
        Route::post('/', [PhotoController::class, 'store'])->name('store');
        Route::get('/{photo}/edit', [PhotoController::class, 'edit'])->name('edit');
        Route::put('/{photo}', [PhotoController::class, 'update'])->name('update');
        Route::delete('/{photo}', [PhotoController::class, 'destroy'])->name('destroy');
    });

    Route::resource('meetings', MeetingController::class)->names([
        'index' => 'meetings.index',
        'create' => 'meetings.create',
        'store' => 'meetings.store',
        'edit' => 'meetings.edit',
        'update' => 'meetings.update',
        'destroy' => 'meetings.destroy',
    ]);

    Route::resource('announcements', AnnouncementController::class)->names([
        'index' => 'announcements.index',
        'create' => 'announcements.create',
        'store' => 'announcements.store',
        'edit' => 'announcements.edit',
        'update' => 'announcements.update',
        'destroy' => 'announcements.destroy',
    ]);

    Route::resource('events', EventController::class)->names([
        'index' => 'events.index',
        'create' => 'events.create',
        'store' => 'events.store',
        'edit' => 'events.edit',
        'update' => 'events.update',
        'destroy' => 'events.destroy',
    ]);

    Route::get('/leitura-do-dia', [DailyReadingController::class, 'edit'])->name('daily-reading.edit');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

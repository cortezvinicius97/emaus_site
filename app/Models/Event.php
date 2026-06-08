<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'description', 'date', 'time', 'location', 'color', 'is_active'];

    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }
}

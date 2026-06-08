<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = ['day', 'title', 'description', 'time', 'location', 'tag', 'is_featured', 'is_active', 'order'];
}

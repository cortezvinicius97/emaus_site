<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyReading extends Model
{
    protected $fillable = ['first_reading_text', 'first_reading_ref', 'second_reading_text', 'second_reading_ref'];
}

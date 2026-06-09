<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyReading extends Model
{
    protected $fillable = ['first_reading_text', 'first_reading_ref', 'first_reading_title', 'second_reading_text', 'second_reading_ref', 'second_reading_title', 'psalm_text', 'psalm_ref', 'psalm_title', 'evangelho_text', 'evangelho_ref', 'evangelho_title'];
}

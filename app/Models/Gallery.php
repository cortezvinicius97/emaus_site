<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['title', 'description', 'is_active'];

    public function photos()
    {
        return $this->hasMany(Photo::class)->orderBy('order');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchScore extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function path()
    {
        return '/matchscores/' . $this->id;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}



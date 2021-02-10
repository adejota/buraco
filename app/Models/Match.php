<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function path()
    {
        return '/matches/' . $this->id;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}






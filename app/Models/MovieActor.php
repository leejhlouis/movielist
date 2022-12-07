<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieActor extends Model
{
    use HasFactory;

    public function movie(){
        return $this->belongsTo(Movie::class);
    }

    public function actor(){
        return $this->belongsTo(Actor::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public function movie_actors(){
        return $this->hasMany(MovieActor::class);
    }
    
    public function movie_genres(){
        return $this->hasMany(MovieGenre::class);
    }

    public function watchlist(){
        return $this->belongsTo(Watchlist::class);
    }
}

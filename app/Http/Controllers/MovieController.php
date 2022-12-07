<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){
        $movies = Movie::all();
        $genres = Genre::all();
        $selectMovies = $movies->take(3);

        return view('home', ['selectMovies' => $selectMovies, 'movies' => $movies, 'genres' => $genres]);
    }

    public function details($id){
        $movies = Movie::all()->take(5);
        $movie = Movie::find($id);

        return view('movies.details', ['movie' => $movie, 'movies' => $movies]);
    }
}

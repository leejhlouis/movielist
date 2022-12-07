<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function index(){
        $movies = Movie::select('movies.id', 'movies.title', 'movies.thumbnail', 'movies.release_date', DB::raw('count(watchlists.movie_id) as watchlist_count'))->leftJoin('watchlists', 'watchlists.movie_id', '=', 'movies.id')->groupBy('movies.id', 'movies.title', 'movies.thumbnail', 'movies.release_date')->orderBy('watchlist_count', 'desc')->get();

        $genres = Genre::all();
        $selectMovies = Movie::inRandomOrder()->limit(3)->get();

        return view('home', ['selectMovies' => $selectMovies, 'movies' => $movies, 'genres' => $genres]);
    }

    public function details($id){
        $movie = Movie::find($id);

        return view('movies.details', ['movie' => $movie]);
    }
}

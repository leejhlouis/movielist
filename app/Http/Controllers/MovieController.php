<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;

class MovieController extends Controller
{
    public function index(Request $request){
        $featuredMovies = Movie::inRandomOrder()->limit(3)->get();
        $popularMovies = Movie::select('movies.id', 'movies.title', 'movies.thumbnail', 'movies.release_date', DB::raw('count(watchlists.movie_id) as watchlist_count'))->leftJoin('watchlists', 'watchlists.movie_id', '=', 'movies.id')->groupBy('movies.id', 'movies.title', 'movies.thumbnail', 'movies.release_date')->orderBy('watchlist_count', 'desc')->get();
        $genres = Genre::all();

        if (isset($request->search)){
            $movies = Movie::where('title', 'like', "%$request->search%")->get();
        }
        else if (isset($request->genre)){
            $movies = Movie::join('movie_genres', 'movie_genres.movie_id', '=', 'movies.id')->where('movie_genres.genre_id', '=', $request->genre)->get();
        }
        else if (isset($request->sortby) && ($request->sortby == "asc" || $request->sortby == "desc")){
            $movies = Movie::orderBy('title', $request->sortby)->get();
        }
        else if (isset($request->sortby) && $request->sortby == "latest"){
            $movies = Movie::orderBy('release_date', 'desc')->get();
        }
        else {
            $movies = $popularMovies;
        }

        return view('home', ['featuredMovies' => $featuredMovies, 'popularMovies' => $popularMovies, 'movies' => $movies, 'genres' => $genres]);
    }

    public function details($id){
        $movie = Movie::find($id);
        $movies = Movie::limit(5)->get();

        return view('movies.details', ['movie' => $movie, 'movies' => $movies]);
    }

    public function insert(Request $request){
        return view('movies.insertMovie');
    }
}

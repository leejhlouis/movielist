<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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

        if (!$movie){
            return abort(404);            
        }

        $movies = Movie::where('id', '<>', $id)->get();

        return view('movies.details', ['movie' => $movie, 'movies' => $movies]);
    }

    public function showActorInInsert(){
        $actors = Actor::all();
        $genres = Genre::all();
        return view('movies.insertMovie', ['actors' => $actors, 'genres' => $genres]);
    }

    public function addMovie(Request $request){
        // Belum validasi aktor & genre

        $this->validate($request, [
            'title' => 'required | min:2 | max:50',
            'desc' => 'required | min:8',
            'genres' => 'required',
            'director' => 'required | min:3',
            'date' => 'required',
            'img' => 'required | mimes:jpeg,jpg,png,gif',
            'background' => 'required | mimes:jpeg,jpg,png,gif'
        ]);

        $image = $request->file('img');
        $bg = $request->file('background');

        $imageFilename = time().'-'.$image->getClientOriginalName();
        $bgFilename = time().'-'.$bg->getClientOriginalName();

        Storage::putFileAs('public/movies/thumbnail/', $image, $imageFilename);
        Storage::putFileAs('public/movies/background/', $bg, $bgFilename);

        DB::table('movies')->insert([
            'title' => $request->title,
            'description' => $request->desc,
            'director' => $request->director,
            'release_date' => $request->date,
            'thumbnail' => $imageFilename,
            'background' => $bgFilename,
        ]);

        $movieId = Movie::all()->last()->id;

        foreach($request->genres as $g){
            DB::table('movie_genres')->insert([
                'movie_id' => $movieId,
                'genre_id' => $g
            ]);
        }

        $ctr = 1;
        do {
            $inputtedActor = 'actor/'.$ctr;
            $inputtedCharacter = 'character_'.$ctr;

            DB::table('movie_actors')->insert([
                'movie_id' => $movieId,
                'actor_id' => $request->$inputtedActor,
                'character_name' => $request->$inputtedCharacter
            ]);

            $ctr++;
            $next = 'actor/'.$ctr;
        } while($request->$next);

        return redirect('/');
    }

    public function showData(Request $request){
        //nanti disini diisi sama actor dan genre dari id yang dikirim
        return view('movies.editMovie');

    }

    public function delete($id){
        $movie = Movie::find($id);

        if ($movie){
            $movie->delete();
        }
        return redirect('/');
    }


}

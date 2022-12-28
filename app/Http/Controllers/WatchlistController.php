<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Watchlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller
{
    public function index(Request $request){
        $paginate = 4;

        if (isset($request->search)){
            $watchlist = Watchlist::join('movies', 'movies.id', '=', 'watchlists.movie_id')
                ->where([['title', 'like', "%$request->search%"], ['user_id', '=', Auth::user()->id]])->paginate($paginate)->appends(['search' => $request->search]);
        } else if (isset($request->status) && $request->status != "all"){
            $watchlist = Watchlist::where([['user_id', '=', Auth::user()->id], ['status', '=', $request->status]])->paginate($paginate)->appends(['status' => $request->status]);
        } else {
            $watchlist = Watchlist::where('user_id', '=', Auth::user()->id)->paginate($paginate);
        }

        return view('watchlist', ["watchlist" => $watchlist]);
    }

    public function add($id){
        $added = Watchlist::where([
            ['user_id', '=', Auth::user()->id],
            ['movie_id', '=', $id]
        ])->get();

        if (Movie::find($id) && $added->isEmpty()){
                $watchlist = new Watchlist();
                $watchlist->user_id = Auth::user()->id;
                $watchlist->movie_id = $id;
                $watchlist->save();

                return redirect('/watchlist');
        }

        return back();
    }

    public function updateStatus($id, Request $request){
        if (isset($request->status)){
            $watchlist = Watchlist::find($id);

            if ($watchlist){
                $watchlist->status = $request->status;
                $watchlist->save();
            }
        }

        return back();
    }

    public function remove($id){
        $watchlist = Watchlist::where([
            ['user_id', '=', Auth::user()->id],
            ['movie_id', '=', $id]
        ])->first();

        if ($watchlist){
            $watchlist->delete();
        }

        return back();
    }
}

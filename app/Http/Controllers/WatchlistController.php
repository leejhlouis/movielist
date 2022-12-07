<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use Illuminate\Http\Request;

class WatchlistController extends Controller
{
    public function index(){
        $watchlist = Watchlist::all();
        return view('watchlist', ["watchlist" => $watchlist]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index(Request $request){
        if (isset($request->search)){
            $actors = Actor::where('name', 'like', "%$request->search%")->get();
        }
        else {
            $actors = Actor::all();
        }

        return view('actors.index', ["actors" => $actors]);
    }

    public function details($id){
        $actor = Actor::find($id);
        
        if (!$actor){
            return abort(404);            
        }

        return view('actors.details', ["actor" => $actor]);
    }

    public function delete($id){
        $actor = Actor::find($id);

        if ($actor){
            $actor->delete();
        }

        return redirect('/');
    }
}

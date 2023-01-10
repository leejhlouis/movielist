<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    public function insert(){
        return view('actors.insertActor');
    }

    public function insertDo(Request $request){
        $this->validate($request, [
            'nama' => 'required | min:3',
            'bio' => 'required | min:10',
            'pob' => 'required',
            'dob' => 'required',
            'img' => 'required | mimes:jpeg,jpg,png,gif',
            'popularity' => 'required | numeric',
            'gender' => 'required'
        ]);
        $actor = new Actor();

        // $image = $request->file('img');

        $actor->name = $request->nama;
        $actor->gender = $request->gender;
        $actor->biography = $request->bio;
        $actor->dob = $request->dob;
        $actor->place_of_birth = $request->pob;
        $actor->image_url = $request->file('img')->getClientOriginalName();
        Storage::putFileAs('public/actors/', $request->file('img'), $actor->image_url);
        $actor->popularity = $request->popularity;
        $actor->save();

        // $actors = Actor::all();
        // return view('actors.index', ["actors" => $actors]);
        return redirect('/actors');
    }

    public function update($id){
        $actors = Actor::find($id);
        return view('actors.updateActor', ['actors' => $actors]);
    }

    public function updateDo(Request $request, $id){
        $this->validate($request, [
            'nama' => 'required | min:3',
            'bio' => 'required | min:10',
            'pob' => 'required',
            'dob' => 'required',
            'img' => 'required | mimes:jpeg,jpg,png,gif',
            'popularity' => 'required | numeric',
            'gender' => 'required'
        ]);

        $image = $request->file('img');
        Storage::putFileAs('public/actors/', $image, $image->getClientOriginalName());

        DB::table('actors')->where('id', $id)->update([
            'name' => $request->nama,
            'biography' => $request->bio,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'place_of_birth' => $request->pob,
            'image_url' => $image->getClientOriginalName(),
            'popularity' => $request->popularity
        ]);

        // $actors = Actor::all();
        // return view('actors.index', ["actors" => $actors]);
        return redirect('/actors');
    }
}

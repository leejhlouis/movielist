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
            'name' => 'required | min:3',
            'biography' => 'required | min:10',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'image' => 'required | mimes:jpeg,jpg,png,gif',
            'popularity' => 'required | numeric',
            'gender' => 'required'
        ]);

        $imageFilename = time().'-'.$request->file('image')->getClientOriginalName();

        $actor = new Actor();

        $actor->name = $request->name;
        $actor->gender = $request->gender;
        $actor->biography = $request->biography;
        $actor->dob = $request->date_of_birth;
        $actor->place_of_birth = $request->place_of_birth;
        $actor->image_url = $imageFilename;
        Storage::putFileAs('public/actors/', $request->file('image'), $actor->image_url);
        $actor->popularity = $request->popularity;
        $actor->save();

        return redirect('/actors');
    }

    public function update($id){
        $actors = Actor::find($id);
        return view('actors.updateActor', ['actors' => $actors]);
    }

    public function updateDo(Request $request, $id){
        $this->validate($request, [
            'name' => 'required | min:3',
            'biography' => 'required | min:10',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'image' => 'required | mimes:jpeg,jpg,png,gif',
            'popularity' => 'required | numeric',
            'gender' => 'required'
        ]);

        $imageFilename = time().'-'.$request->file('image')->getClientOriginalName();

        Storage::putFileAs('public/actors/', $request->file('image'), $imageFilename);

        DB::table('actors')->where('id', $id)->update([
            'name' => $request->name,
            'biography' => $request->biography,
            'gender' => $request->gender,
            'dob' => $request->date_of_birth,
            'place_of_birth' => $request->place_of_birth,
            'image_url' => $imageFilename,
            'popularity' => $request->popularity
        ]);

        return redirect('/actors/'.$id);
    }
}

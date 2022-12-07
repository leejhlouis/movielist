<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index(){
        $actors = Actor::all();
        return view('actors.index', ["actors" => $actors]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function login(){
        return view('login');
    }

    public function regis(){
        return view('register');
    }

    public function newUser(Request $request){
        $this->validate($request, [
            'username' => 'required | min:5 | unique:users,username',
            'email' => 'required | email | unique:users,email',
            'password' => [
                'required',
                'min:6',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
            ],
            'conPassword' => 'required|same:password|min:6'
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->date_joined = Carbon::now()->setTimezone('Asia/Jakarta');
        $user->save();

        Auth::login($user);

        return redirect('/');
    }

    public function newLogin(Request $request){
        $email = $request->email;
        $pass = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $pass], true)){
            return redirect('/');
        } else{
            return back();
        }

        $credential = [
            'email' => $email,
            'password' => $pass
        ];

        if($request->remember_me){
            Cookie::queue('cookie', $credential, 120);
        }else{
            Cookie::queue('cookie', $credential, -1);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
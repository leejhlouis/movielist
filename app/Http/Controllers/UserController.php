<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function regis(){
        return view('auth.register');
    }

    public function newUser(Request $request){
        $this->validate($request, [
            'username' => 'required|min:5|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'min:6',
                'confirmed',
                'regex:/[A-Za-z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/',
            ]], [
                'password.regex' => "The :attribute must contain at least one uppercase letter, one lowercase letter, one number, and one special character.",
            ]
        );

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
            $credential = [
                'email' => $email,
                'password' => $pass
            ];
        
            if($request->remember_me){
                Cookie::queue('cookie', $credential, 120);
            }else{
                Cookie::queue('cookie', $credential, -1);
            }
            
            return redirect('/');
        } else{
            return back()->withErrors(
                ['authError' => "Your email or password is incorrect. Please try again!"]
            );
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}

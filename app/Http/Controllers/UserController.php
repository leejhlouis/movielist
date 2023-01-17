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
        return view('auth.login');
    }

    public function regis(){
        return view('auth.register');
    }

    public function newUser(Request $request){
        $this->validate($request, [
            'username' => 'required|min:5|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|alpha_num|min:6|confirmed'
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
        $password = $request->password;

        if ($request->remember_me){
            Cookie::queue('cookie_email', $email, 120);
            Cookie::queue('cookie_password', $password, 120);
        } else{
            Cookie::queue('cookie_email', $email, -1);
            Cookie::queue('cookie_password', $password, -1);
        }

        if (Auth::attempt(['email' => $email, 'password' => $password], true)){
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

    public function profile(){
        return view('profile');
    }

    public function updateProfile(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required | email:rfc,dns',
            'date_of_birth' => 'required',
            'phone' => 'required | min:5 | max:13'
        ]);

        $currentUserId = Auth::user()->id;

        DB::table('users')->where('id', $currentUserId)->update([
            'username' => $request->name,
            'email' => $request->email,
            'dob' => $request->date_of_birth,
            'phone' => $request->phone
        ]);

        return redirect('/profile');
    }

    public function updateProfilePicture(Request $request){
        $this->validate($request, [
            'image_URL' => 'required'
        ]);

        $user = User::find(Auth::user()->id);
        $user->img_url = $request->image_URL;
        $user->save();

        return redirect('/profile');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(){
        return view("register");
    }

    public function registration(Request $request){
        $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required",
            "password_confirmation" => "required"
        ]);

        $request->password = bcrypt($request->password);

        $registrationData = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
            "password_confirmation" => $request->password_confirmation
        ];

        $user = new User;
        $user->create($registrationData);

        // return redirect()->route("user.dashboard");
        return view('dashboard', ["user" => User::where('email', $request->email)->first()]);
    }

    public function userLogin(){
        return view('login');
    }

    public function login(Request $request){

        $request->validate([
            "email" => "required",
            "password" => "required",
        ]);

        $credentials = [
            "email" => $request->email,
            "password" => $request->password
        ];

        if(Auth::attempt($credentials)){
            return view('dashboard', ["user" => User::where('email', $request->email)->first()]);
        }

        return redirect()->route('user.login')->withErrors("Login Credentials are invalid");
    }

    public function logout(){
        Auth::logout();
        return redirect()->route("user.login");
    }
}

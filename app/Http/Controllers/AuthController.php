<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $user;
    protected $product;

    public function __construct(User $user, Product $product)
    {
        $this->user = $user;
        $this->product = $product;
    }

    public function register(){
        return view("register");
    }

    public function registration(Request $request){
        $request->validate([
            "name" => "required",
            "email" => "required",
            "role" => "required",
            "password" => "required",
            "password_confirmation" => "required"
        ]);

        $request->password = bcrypt($request->password);

        $registrationData = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
            "role" => $request->role,
            "password_confirmation" => $request->password_confirmation
        ];


        $this->user->create($registrationData);

        return view('dashboard', ["user" => User::where('email', $request->email)->first(), 'products'=> $this->product->all()]);
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
            $user = $this->user->where('email', $request->email)->first();

            if($user->role !== 'admin'){
                return view('dashboard', ["user"=> $user,"products" => $this->product->all()]);
            }

            return redirect()->route("admin.dashboard");

        }

        return redirect()->route('user.login')->withErrors("Login Credentials are invalid");
    }

    public function logout(){
        Auth::logout();
        return redirect()->route("user.login");
    }


}

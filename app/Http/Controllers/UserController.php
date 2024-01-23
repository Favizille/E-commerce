<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard(){
        return view('dashboard');
    }

    public function adminDashboard(){
        $user = new User;
        $users = $user->all();
        return view('AdminDashboard', ['users' => $users]);
    }
}

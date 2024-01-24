<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard(){
        $user = new User;
        $users = $user->all();
        return view('AdminDashboard', ['users' => $users]);
    }


  public function users(){
    return view("users");
  }
}

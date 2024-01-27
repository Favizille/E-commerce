<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    protected $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    public function dashboard(){
        return view('AdminDashboard');
    }


  public function users(){
    return view("users", ["users" => $this->user->all()]);
  }
}

<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function dashboard(){
        return view('dashboard', ["user" => auth()->user(), "products" => $this->product->all()]);
    }

    public function checkout($productID){

        return view("checkout", ["product" => $this->product->find($productID)]);
    }
}

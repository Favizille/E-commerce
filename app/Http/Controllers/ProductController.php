<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function add(){
        return view("AddProduct");
    }

    public function create(Request $request){
        $product= $request->validate([
            "name" => "required",
            "description" => "required",
            "price"=> "required",
            "quantity" => "required",
            "status" => "required",
        ]);

        Product::create($product);

        return redirect()->route('user.dashboard');
    }

    public function edit(){
        return view("EditProduct");
    }

    public function update(Request $request){

    }

    public function delete(){

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

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

        $this->product->create($product);

        return redirect()->route('admin.dashboard');
    }

    public function getall(){
        return view("Product.Products", ["products" =>  $this->product->all()]);
    }

    public function edit($produtID){

        return view("Product/EditProduct", ["product" => $this->product->find($produtID)]);
    }

    public function update(Request $request, $productID){

        $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required',
        'quantity' => 'required',
        'status' => 'required',
        ]);

        $product = $this->product->find($productID);

        // dd($productID);

        if(! $product->update($request->all())){
           return redirect()->back()->withErrors( 'Unable to Update');
        }
        return redirect()->route('product.edit', $product->id)
        ->with('message', 'Product updated successfully.');
    }

    public function delete($productID){
        $product = $this->product->find($productID);

        $product->delete();

        return redirect()->route('products.all')->with('success','Successfully Deleted');
    }
}

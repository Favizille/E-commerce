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

    public function addProduct(){
        return view("AddProduct");
    }

    public function createProduct(Request $request){
        // $product= $request->validate([
        //     "name" => "required",
        //     "description" => "required",
        //     "price"=> "required",
        //     "quantity" => "required",
        //     "status" => "required",
        //     "image" => "required",
        // ]);

        // $product = new Product;
        $this->product->name = $request->input('name');
        $this->product->description = $request->input('description');
        $this->product->price = $request->input('price');
        $this->product->quantity = $request->input('quantity');
        $this->product->status = $request->input('status');

        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('uploads/product/', $filename);
            $this->product->image = $filename;
        }else{
            return $request;
            $this->product->image = '';
        }

        $this->product->save();

        return redirect()->route('product.all');
    }

    public function getAllProducts(){
        return view("Product.Products", ["products" =>  $this->product->all()]);
    }

    public function editProduct($produtID){

        return view("Product/EditProduct", ["product" => $this->product->find($produtID)]);
    }

    public function updateProduct(Request $request, $productID){

        $product = $this->product->find($productID);

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->status = $request->input('status');

        if($request->hasfile('image')){

            $destination = 'upload/product/'.$product->image;
            if(file::exists($destination)){
                file::delete($destination);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('uploads/product/', $filename);
            $product->image = $filename;
        }else{
            return $request;
            $product->image = '';
        }

        if(! $product->update()){
           return redirect()->route('product.edit', $product->id)->withErrors( 'Unable to Update');
        }

        return redirect()->route('product.edit', $product->id)->with('message', 'Product updated successfully.');
    }

    public function deleteProduct($productID){
        $product = $this->product->find($productID);

        $product->delete();

        return redirect()->route('products.all')->with('success','Successfully Deleted');
    }
}

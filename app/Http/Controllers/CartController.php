<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $user;
    protected $product;
    protected $cart;

    public function __construct(User $user, Product $product, Cart $cart){}

    public function createCart($productID){

        $data = [
            "user_id" => auth()->user()->id,
            "product_id" => $this->product->find($productID),
        ];

        $this->cart->create($data);

        return view('cart', ['cart'=> $data]);

    }
}

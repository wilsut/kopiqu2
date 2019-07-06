<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }

    public function cart()
    {
        return view('products.cart');
    }

    public function addToCart(Request $request)
    {
        $id = $request->id;
        $product = Product::find($id);

        if(!$product) {
            session()->flash('error', 'Product failed to add to cart');
            return;
        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                $id => [
                    "id" => $id,
                    "name" => $product->name,
                    "quantity" => $request->quantity,
                    "price" => $product->price,
                    "image" => $product->image,
                    "weight" => $product->weight
                ]
            ];
        }
        // if cart not empty then check if this product exist then increment quantity
        else if(isset($cart[$id])) {
            $cart[$id]['quantity'] += $request->quantity;
        }
        // if item not exist in cart then add to cart with quantity = 1
        else {
            $cart[$id] = [
                "id" => $id,
                "name" => $product->name,
                "quantity" => $request->quantity,
                "price" => $product->price,
                "image" => $product->image,
                "weight" => $product->weight
            ];
        }

        session()->put('cart', $cart);
        session()->flash('success', 'Product added to cart successfully');
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}

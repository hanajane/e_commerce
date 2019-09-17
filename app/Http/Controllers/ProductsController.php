<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Cart;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Mail\OrderCreatedEmail;
use Illuminate\Support\Facades\Mail;

class ProductsController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->get();

        return view("allProducts", compact("products"));
    }

    public function addProductToCart(Request $request,$id)
    {
//        $request->session()->forget("cart");
//        $request->session()->flush();

        $prevCart = $request->session()->get('cart');

        $cart = new Cart($prevCart);

        $product = Product::find($id);
        $cart->addItem($id, $product);
        $request->session()->put('cart', $cart);

//        dump($cart); checks products as arrays

        return redirect()->route("allProducts");
    }

    public function showCart()
    {
        $cart = Session::get('cart');
            if($cart)
            {
               return view("cartProducts", ['cartItems' => $cart]);
    //            dump($cart);
            }
            else
            {
                return redirect()->route("allProducts");
    //            echo "cart is empty";
            }
    }

    public function deleteItemFromCart(Request $request, $id)
    {
        $cart = $request->session()->get('cart');
        if(array_key_exists($id, $cart->items))             //the $cart is the array we request from the session
        {
            unset($cart->items[$id]);
        }
        $prevCart = $request->session()->get('cart');
        $updatedCart = new Cart($prevCart);
        $updatedCart->updateQuantity();

        $request->session()->put('cart', $updatedCart);     //updates or overrides  the session to update the existing cart
        return redirect()->route('cartProducts');
    }
}

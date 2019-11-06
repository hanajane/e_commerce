<?php

namespace App\Http\Controllers\Payment;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PaymentsController extends Controller
{
    //

    public function index(){

     /*   $products = [0=> ["name"=>"Iphone","category"=>"smart phones","price"=>1000],
            1=> ["name"=>"Galaxy","category"=>"tablets","price"=>2000],
            2=> ["name"=>"Sony","category"=>"TV","price"=>3000]];*/

        $products = Product::paginate(3);

        return view("allproducts",compact("products"));

    }

    public function showPaymentPage()
    {
        $payment_info = Session::get('payment_info');

        //cart is not paid yet
        if($payment_info['status'] == 'on_hold')
        {
            return view('payment.paymentPage',['payment_info'=> $payment_info]);
        }
        //cart is empty
        else 
        {
            return redirect()->route("allProducts");
        }
        //delete cart
        Session::forget("cart");
        Session::flush();
    }

    public function showCart()
    {
        $cart = Session::get('cart');

        //cart is not empty
        if($cart)
        {
            return view('cartproducts',['cartItems'=> $cart]);
            //cart is empty
        }
        else
        {
            return redirect()->route("allProducts");
        }
    }
}
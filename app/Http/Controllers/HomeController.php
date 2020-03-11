<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function showUserProfile(Request $request)
    {
        // $user = Auth::User();
        // $user_id = $user->id;
        // $orders_info = DB::table('orders')->get();

        // $userOrders = DB::table('order_items')->get();

        // $users =  $user;
        //     $request->session()->put('users',$users);  // this is to send the variable to the view // function used: showPaymentPage

            // $payment_info =  $newOrderArray;
            // $payment_info['order_id'] = $order_id;

            // $request->session()->put('payment_info',$payment_info);
        return view('userProfile');
    }
}

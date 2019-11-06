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
//      $products = DB::table('products')->get();
        $products = Product::paginate(6);

        return view("homePage", compact("products"));
    }

    //all products
    public function shopAll()
    {
      $products = Product::paginate(6);
      return view("allProducts", compact("products"));
    }

    //category for swimwear
    public function swimwearProducts()
    {
        $products = DB::table('products')->where('type', "swimwears")->get();
        return view("swimwears", compact("products"));
    }

    //category for cover ups
    public function coverUpProducts()
    {
        $products = DB::table('products')->where('type', "coverUps")->get();
        return view("coverUps", compact("products"));
    }

    //category for accessories
    public function accessoryProducts()
    {
        $products = DB::table('products')->where('type', "accessories")->get();
        return view("accessories", compact("products"));
    }

    //search products
    public function search(Request $request)
    {
        $searchText = $request->get('searchText');
        $products = Product::where('name', "LIke", $searchText."%")
                            ->orWhere('type', "LIke", $searchText."%")
                            ->orWhere('hashtags', "LIke", $searchText."%")->paginate(3);
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
        $updatedCart->updatePriceAndQuantity();

        $request->session()->put('cart', $updatedCart);     //updates or overrides the session to update the existing cart
        return redirect()->route('cartProducts');
    }

    //increase single product
    public function increaseSingleProduct(Request $request, $id)
    {
        $prevCart   = $request->session()->get('cart');
        $cart       = new Cart($prevCart);

        $product    = Product::find($id);
        $cart->addItem($id, $product);
        $request->session()->put('cart', $cart);

        //dump cart
    return redirect()->route("cartProducts");

    }

    //decrease single product
    public function decreaseSingleProduct(Request $request, $id)
    {
        $prevCart   = $request->session()->get('cart');
        $cart       = new Cart($prevCart);

        if($cart->items[$id]['quantity'] > 1)
            {
                $product    = Product::find($id);
                $cart->items[$id]['quantity'] = $cart->items[$id]['quantity']-1;
                $cart->items[$id]['totalSinglePrice'] = $cart->items[$id]['quantity'] * $product['price'];
                $cart->updatePriceAndQuantity();

                $request->session()->put('cart', $cart);
            }

        return redirect()->route("cartProducts");
    }


    //create order
    public function createOrder()
    {
        $cart = Session::get('cart');

        //cart is not empty
        if($cart) {
        // dump($cart);
            $date = date('Y-m-d H:i:s');
            $newOrderArray = array("status"=>"on_hold","date"=>$date,"del_date"=>$date,"price"=>$cart->totalPrice);
            $created_order = DB::table("orders")->insert($newOrderArray);
            $order_id = DB::getPdo()->lastInsertId();;

            foreach ($cart->items as $cart_item)
            {
                $item_id = $cart_item['data']['id'];
                $item_name = $cart_item['data']['name'];
                $item_price = $cart_item['data']['price'];
                $newItemsInCurrentOrder = array("item_id"=>$item_id,"order_id"=>$order_id,"item_name"=>$item_name,"item_price"=>$item_price);
                $created_order_items = DB::table("order_items")->insert($newItemsInCurrentOrder);
            }

            //delete cart
            Session::forget("cart");
            Session::flush();
            return redirect()->route("allProducts")->withsuccess("Thanks For Choosing Us");
        }
        else
        {
            return redirect()->route("allProducts");
        }
    }

//check out products
    public function checkOutProducts()
    {
        return view('checkOutProducts');
    }

//check our proccess
    public function createNewOrder(Request $request)
    {
       $cart = Session::get('cart');
        
       $first_name      = $request->input('first_name');
       $last_name       = $request->input('last_name');
       $email           = $request->input('email');
       $phone           = $request->input('phone');
       $address_1       = $request->input('address_1');
       $address_2       = $request->input('address_2');
       $city            = $request->input('city');
       $province_state  = $request->input('province_state');
       $zip_postal      = $request->input('zip_postal');
       $country         = $request->input('country');

    //check if user is logged in or not
    //    $isUserLoggedIn = Auth::check();

    //   if($isUserLoggedIn)
    //   {
    //   	//get user id
    //      $user_id = Auth::id();  //OR $user_id = Auth:user()->id;

    //   }
    //   else
    //   {
    //   	//user is guest (not logged in OR Does not have account)
    //     $user_id = 0;
    //   }
      
    //cart is not empty
        if($cart)
        {
    // dump($cart);
        $date = date('Y-m-d H:i:s');
        $newOrderArray = array("status"=>"on_hold","date"=>$date,"del_date"=>$date,"price"=>$cart->totalPrice,
        "first_name"=>$first_name, "last_name"=>$last_name, "email"=> $email, 'phone'=>$phone, "address_1"=>$address_1, "address_2"=>$address_2, 'city'=>$city,'province_state'=>$province_state,'zip_postal'=>$zip_postal, 'country'=>$country);
        
        $created_order = DB::table("orders")->insert($newOrderArray);
        $order_id = DB::getPdo()->lastInsertId();;

        foreach ($cart->items as $cart_item)
        {
            $item_id = $cart_item['data']['id'];
            $item_name = $cart_item['data']['name'];
            $item_price = $cart_item['data']['price'];
            $newItemsInCurrentOrder = array("item_id"=>$item_id,"order_id"=>$order_id,"item_name"=>$item_name,"item_price"=>$item_price);
            $created_order_items = DB::table("order_items")->insert($newItemsInCurrentOrder);
        }

            //send the email

            //delete cart
            Session::forget("cart");
            Session::flush();

            $payment_info =  $newOrderArray;
            // $payment_info['order_id'] = $order_id;
            $request->session()->put('payment_info',$payment_info);

        //   print_r($newOrderArray); //checks if products are proceeded
            
         return redirect()->route("showPaymentPage");
        }
        else
        {
        //   return redirect()->route("allProducts");
        print_r('error');
        }
   }
}

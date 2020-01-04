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
        $products = Product::paginate(6); // orig

        // $products = DB::table('products')->leftJoin('product_image', 'products.id', '=', 'product_image.productImage_id')
        //     ->get();
        // $products = DB::table('products')
// // ->paginate(6)  
//      ->join("product_image", "products.id", "=", "product_image.id")

//      ->select("products.id", "product_image.image")    

//     //   ->join("table3 AS t3", "t3.id", "=", "t2.id")

//       ->where("image", "=", "productImage_id")

//        ->get();
        // $images = DB::table("product_image")->get();
        // $image = Product::find($products)->where($products->productImage_id, $images);

        return view("allProducts", compact("products", "image"));
    }

    //category for swimwear
    public function swimwearProducts()
    {
        $products = DB::table('products')->where('productType_id', 1)->get();
        return view("swimwear", compact("products"));
    }

    //category for cover ups
    public function coverUpProducts()
    {
        $products = DB::table('products')->where('productType_id', 2)->get();
        return view("coverUps", compact("products"));
    }

    //category for accessories
    public function accessoryProducts()
    {
        $products = DB::table('products')->where('productType_id', 3)->get();
        return view("accessories", compact("products"));
    }

    //search products
    public function search(Request $request)
    {
        $searchText = $request->get('searchText');
        $products = Product::where('name', "Like", $searchText."%")
                            ->orWhere('type', "Like", $searchText."%")
                            ->orWhere('hashtags', "Like", $searchText."%")->paginate(3);

        return view("allProducts", compact("products"))->render();;
    }

    //swimwear filters
        //category for swimwear
            // private function swimwearType($id){
            //      $products = DB::table('products')->where('swimwearType_id', $id)->get();
            //      return view("swimwear", compact("products"));
            // }
            // public function swimwearTypeProducts()
            // {
            //     return swimwearType(1);
            // }
            public function multiwayProducts()
            {
                $products = DB::table('products')->where('swimwearType_id', 1)->get();
                return view("swimwear", compact("products"));
            }
            public function monokiniProducts()
            {
                $products = DB::table('products')->where('swimwearType_id', 2)->get();
                return view("swimwear", compact("products"));
            }
            public function twoPieceProducts()
            {
                $products = DB::table('products')->where('swimwearType_id', 3)->get();
                return view("swimwear", compact("products"));
            }
            public function onePieceProducts()
            {
                $products = DB::table('products')->where('swimwearType_id', 4)->get();
                return view("swimwear", compact("products"));
            }
            public function highNeckProducts()
            {
                $products = DB::table('products')->where('swimwearType_id', 5)->get();
                return view("swimwear", compact("products"));
            }
            public function longLineProducts()
            {
                $products = DB::table('products')->where('swimwearType_id', 6)->get();
                return view("swimwear", compact("products"));
            }
            public function oneShoulderProducts()
            {
                $products = DB::table('products')->where('swimwearType_id', 7)->get();
                return view("swimwear", compact("products"));
            }
            public function sportTopProducts()
            {
                $products = DB::table('products')->where('swimwearType_id', 8)->get();
                return view("swimwear", compact("products"));
            }

    //end swimwear filters

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

//show single product
    public function showSingleProduct($id)
    {
        $product = Product::find($id);
        // return view('singleProduct', ['product' => $product]); //same result as the one below
        return view('singleProduct')->with( 'product', $product );
    }
//show cart
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
        return redirect()->back(); //to redirect to the same page
    // return redirect()->route("cartProducts");

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
            return redirect()->back(); //to redirect to the same page
        // return redirect()->route("cartProducts");
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

//initiate checkout
    public function checkOut()
    {
        $cart = Session::get('cart');  //get cart

        if($cart)                       //if not empty
        {
            return view("checkOut", ['cartItems' => $cart]); //passing data to checkout
//            dump($cart);
        }
        else {
            return view("checkOut"); 
        }
    }

//check out products
    public function checkOutProducts()
    {       
        $cart = Session::get('cart');  //get cart

        if($cart)                       //if not empty
        {
            return view("checkOutProducts", ['cartItems' => $cart]); //passing data to checkout
//            dump($cart);
        }
        // else {

        // }
    }

//checkout guest
    public function checkOutGuestProducts()
    {      
        $cart = Session::get('cart');  //get cart

        if($cart)                       //if not empty
        {
            return view("checkOutGuest", ['cartItems' => $cart]); //passing data to checkout
            //dump($cart);
        }
    }

//check our proccess
    public function createNewOrder(Request $request)
    {
       $cart = Session::get('cart');  

        // $tax_gst = .05;
        // $tax_qst = 0.095;
        // $total_tax = $tax_gst + $tax_qst;
       $first_name      = $request->input('first_name');
       $last_name       = $request->input('last_name');
       $email           = $request->input('email');
       $phone           = $request->input('phone');
       $address_1       = $request->input('address_1');
       $address_2       = $request->input('address_2');
       $city            = $request->input('city');
       $state_province  = $request->input('state_province');
       $zip_postal      = $request->input('zip_postal');
       $country         = $request->input('country');
       $message         = $request->input('message');

        // $userData = Auth::user();
    // foreach ($userData as $userData)
    // {
    // $first_name      = $userData['first_name'];
    // $last_name       = $userData['last_name'];
    // $email           = $userData['email'];
    // $phone           = $userData['phone'];
    // $address_1       = $userData['address_1'];
    // $address_2       = $userData['address_2'];
    // $city            = $userData['city'];
    // $state_province  = $userData['state_province'];
    // $zip_postal      = $userData['zip_postal'];
    // $country         = $userData['country'];
    // $message         = $userData['message'];
    // }
    //    $user_id         = $request->input('user_id');

    //check if user is logged in or not
        $isUserLoggedIn = Auth::check();

        if($isUserLoggedIn)
        {
            //get user id
            $user_id = Auth::id();  //OR $user_id = Auth:user()->id;
        }
        else
        {
            //user is guest (not logged in OR Does not have account)
            $user_id = 0;
        }
      
    //cart is not empty
        if($cart)
        {
    // dump($cart);
        $date = date('Y-m-d H:i:s');
        $newOrderArray = array("user_id" => $user_id, "status" => "on_hold","date"=>$date,"del_date"=>$date,"price"=>$cart->totalPrice,
        "first_name"=>$first_name, "last_name"=>$last_name, "email"=> $email, 'phone'=>$phone, "address_1"=>$address_1, "address_2"=>$address_2, 'city'=>$city,'state_province'=>$state_province,'zip_postal'=>$zip_postal, 'country'=>$country);
        
        $created_order = DB::table("orders")->insert($newOrderArray);
        $order_id = DB::getPdo()->lastInsertId();

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
            // Session::forget("cart");
            // Session::flush();
            // $tax = array( "tax_gst" => $tax_gst, "tax_qst" => $tax_qst);
            $product_info =  $newItemsInCurrentOrder;
            $request->session()->put('product_info',$product_info);  // this is to send the variable to the view // function used: showPaymentPage

            $payment_info =  $newOrderArray;
            $payment_info['order_id'] = $order_id;

            $request->session()->put('payment_info',$payment_info); // this is to send the variable to the view // function used: showPaymentPage


        //   print_r($newOrderArray); //checks if products are proceeded
            
         return redirect()->route("showPaymentPage");
        }
        else
        {
        //   return redirect()->route("allProducts");
        print_r('error');
        }
   }
        public function getPaymentInfoByOrderId($order_id)
        {
            $paymentInfo = DB::table('payments')->where('order_id', $order_id)->get();
            return json_encode($paymentInfo[0]);
        }

        private function sendMail()
        {
        $user = Auth::user();
        $cart = Session::get('cart');
        
        if($cart != null && $user != null ){
            Mail::to($user)->send(new OrderCreatedEmail($cart));
        }
    }
}

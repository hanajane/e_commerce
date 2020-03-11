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

    public function index()
    {
        $products = Product::paginate(3);

        return view("allproducts",compact("products"));
    }

    public function showPaymentPage(Request $request)
    {
        //this is t initiate the shipping methode when the  total order amount > $100
        // $radio = $request->get('radion_button', 0);

            // $fields = Input::get('result');
            // if($fields == 'buy'){
            // // logic
            // }
            // else{
            // // logic
            // }

            $shipping_method = $request->get('shipping_method');
            // $shipping_methods = DB::table('shipping_methods')->where('id', $shipping_method)->get();
            $shipping_methods = DB::table('shipping_methods')->get();

        $cart = Session::get('cart');
        $payment_info = Session::get('payment_info');
        $product_info = Session::get('product_info');

        //cart is not paid yet
        if($payment_info['status'] == 'on_hold')
        {
            return view('payment.paymentPage', ['payment_info'=> $payment_info, 'product_info'=> $product_info, 'cartItems' => $cart, 'shipping_methods' => $shipping_methods]); //passing arrays to the view paymentPage //pass this for thr shipping methode : 'shipping_methods' => $shipping_methods
        }
        //cart is empty
        else 
        {
            return redirect()->route("allProducts");
        }

        //delete cart
        Session::forget("cart");
        // Session::flush();
    }

        private function storePaymentInfo($paypalPaymentID,$paypalPayerID)
        {
           $payment_info = Session::get('payment_info');
           $order_id = $payment_info['order_id'];
           $status = $payment_info['status'];
           $paypal_payment_id = $paypalPaymentID;
           $paypal_payer_id = $paypalPayerID;

        if($status == 'on_hold')
            {
            
                //create (issue) a new payment row in payments table
                    $date = date('Y-m-d H:i:s');
                    $newPaymentArray = array("order_id"=>$order_id,"date"=>$date,"amount"=>$payment_info['price'],
                        "paypal_payment_id"=>$paypal_payment_id, "paypal_payer_id" => $paypal_payer_id);

                    $created_order = DB::table("payments")->insert($newPaymentArray);

                //update payment status in orders table to "paid"
            
            DB::table('orders')->where('id', $order_id)->update(['status' => 'paid']); // updating table 'orders'. getting the currect status(on_hold) to paid in the current order_id
            
            }
        }

    //show payment receipt
    public function showPaymentReceipt($paypalPaymentID, $paypalPayerID)
    {
        if(!empty($paypalPaymentID) && !empty($paypalPayerID))
        {   //will return json -> contains transaction status
            $this->validate_payment($paypalPaymentID, $paypalPayerID);
            $this->storePaymentInfo($paypalPaymentID, $paypalPayerID);

            $payment_receipt = Session::get('payment_info');
            $payment_receipt ['paypal_payment_id'] = $paypalPaymentID;
            $payment_receipt ['paypal_payer_id'] = $paypalPayerID;

            //delete payment_info from the session
            Session::forget('payment_info');
            Session::forget("cart");
            // Session::flush();

            return view('payment.paymentReceipt', ['payment_receipt' => $payment_receipt]);
        }
        else
        {
            return redirect()->route("allProducts");
        }
    }

   // shipping method
    public function shippingMethod(Request $request)
    {
        $shipping_method = Input::get('shipping_method');
        $shipping_methods = DB::table('shipping_methods')->where('id', $shipping_method)->get();
        // ('id', $shipping_method)->get();
    }

    //payment validation
    private function validate_payment($paypalPaymentID, $paypalPayerID)
    {
        $paypalEnv       = 'production'; // Or 'production'
        $paypalURL       = 'https://api.paypal.com'; //change this to paypal live url when you go live
        $paypalClientID  = 'ARhd0L1561f3oo4Sl1DdFaUJ70AXbYjeCPUU5e6Qsb5GSQmpPHPZdgR1F69xsbfS2-g0jp2UeGZjb5kh';
        $paypalSecret   = 'EMsqKoxD7nayFtl4TsMq0a12gmHMieczOnUg1Ll92AmMZGTm7m36qh5NjezLY2E95AJtb96H5YKF_Cbj';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $paypalURL.'oauth2/token');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $paypalClientID.":".$paypalSecret);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        $response = curl_exec($ch);
        curl_close($ch);
        
        if(empty($response))
        {
            return false;
        }
        else
        {
            $jsonData = json_decode($response);
            $curl = curl_init($paypalURL.'payments/payment/'.$paypalPaymentID);
            curl_setopt($curl, CURLOPT_POST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $jsonData->access_token,
                'Accept: application/json',
                'Content-Type: application/xml'
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            
            // Transaction data
            $result = json_decode($response);
            
            return $result;
        }
    
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
            // Session::flush();
            return redirect()->route("allProducts")->withsuccess("Thanks For Choosing Us");
        }
        else
        {
            return redirect()->route("allProducts");
        }
    }

       public function getPaymentInfoByOrderId($order_id){
   
        $paymentInfo = DB::table('payments')->where('order_id', $order_id)->get();
         return json_encode($paymentInfo[0]);
   }

   //show cart
public function showUpdateCart()
{
    $cart = Session::get('cart');
        if($cart)
        {
            return view("updateCart", ['cartItems' => $cart]);
//            dump($cart);
        }
        else
        {
            return redirect()->route("allProducts");
//            echo "cart is empty";
        }
}

    //duplicated from productsController
    // public function showCart()
    // {
    //     $cart = Session::get('cart');

    //     //cart is not empty
    //     if($cart)
    //     {
    //         return view('cartproducts',['cartItems'=> $cart]);
    //         //cart is empty
    //     }
    //     else
    //     {
    //         return redirect()->route("allProducts");
    //     }
    // }
}

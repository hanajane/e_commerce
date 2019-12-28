
@extends('layouts.index')

@section('center')

   <div id="page-header" class="checkout">
        <div class="container">
            <div class="page-header-content text-center">
                <div class="page-header wsub">
                    <h1 class="page-title fadeInDown animated first">Order Confirmation</h1>
                </div><!-- / page-header -->
            </div><!-- / page-header-content -->
        </div><!-- / container -->
    </div><!-- / page-header -->
<section id="cart_items">
    <div class="container">
        {{-- <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{route('allProducts')}}">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div> --}}
            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-12 clearfix">
                        <div class="bill-to">
                          
                          {{-- <p>Please review the contents of your order below and then choose how you'd like to pay for your order.</p> --}}
                          <h4 class=""> Account Details</h4> 
                          <ul>
                            <li>
                              <span class="h5">Checking Out as : </span>
                              @if ($payment_info['user_id'] == 0) Guest
                              @else {{$payment_info['email']}} @endif
                            </li>
                          </ul> 
                          <h4 class="orderConfMargins"> Shipping/Bill To</h4>
                            <div class="">
                              <ul>
                                  <li><span class="h5">Name : </span>{{ ucfirst(trans($payment_info['first_name'])) }} {{ ucfirst(trans($payment_info['last_name']))}}</li>
                                  <li><span class="h5">Address : </span>{{ ucfirst(trans($payment_info['address_1'])) }} {{ $payment_info['address_2'] }} {{ ucfirst(trans($payment_info['city'])) }} <br /> {{ ucfirst(trans($payment_info['state_province'])) }}, {{ ucfirst(trans($payment_info['country'])) }} ({{ ucfirst(trans($payment_info['zip_postal'])) }})</li>
                              </ul>
                                @if (Auth::check())
                                <a href="{{ route('checkOutGuestProducts') }}" class="btn btn-default update">{ FIX REGISTER INFO}</a>
                                @else
                                <a href="{{ route('checkOutGuestProducts') }}" class="btn btn-default update">Update Billing Info</a>
                                @endif
                               
                            </div>
                            <h4 class="orderConfMargins"> Order Details</h4>
                              <div class="">
                              <!-- shopping cart table -->
                                <table class="shopping-cart">
                                    <thead>
                                        <tr>
                                            <th class="image">&nbsp;</th>
                                            <th></th>
                                            <th>Qty</th>
                                            <th>Item Price</th>
                                            <th>Item Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems->items as $item)
                                            <tr class="cart-item">
                                                <td class="image">
                                                    <a href=""><img src="{{Storage::disk('local')->url('product_images/'.$item['data']['image'])}}" alt="item" width="100" height="100"></a>
                                                </td>
                                                <td><a href=""><h5>{{$item['data']['name']}}</h5></a>
                                                    <p>{{$item['data']['size']}}</p>
                                                </td>
                                                  <td class="qty">
                                                      <div class="cart_quantity_button">
                                                              <input class="cart_quantity_input" type="text" name="quantity" value="{{$item['quantity']}}" autocomplete="off" size="2">
                                                      </div>
                                                  </td>
                                                <td>${{$item['data']['price']}}</td>
                                                <td>${{$item['totalSinglePrice']}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- / shopping cart table -->
                                <a class="btn btn-default update" href="{{ route('showUpdateCart') }}">Update Cart</a>
                              </div>
                            <div class="total_area">
                              
                            <h4 class="orderConfMargins"> Confirm Order</h4>
                              <ul>
                                  {{-- <li>Payment Status
                                  @if($payment_info['status'] == 'on_hold')
                                    <span>not paid yet</span>
                                  @endif
                                  </li> --}}
                                  {{-- <li>GST <span>{{}}</span><br />
                                      QST <span>{{}}</span>
                                  </li> --}}
                                  @if ($payment_info['price'] > 100)
                                    <li>Shipping Cost <span>Free</span></li>
                                  @else
                                    <li>Please choose the shipping method for your order:</li>

                          {{--                                      
                                  @foreach($result as $result)                                    
                                      <tr class="success">    
                                          <td>{{ Form::radio('result') }}
                                          <td>{{ $result->name}}</td>                 
                                          <td>{{ $result->code}}</td>                 
                                      </tr>        --}}               
                                  {{-- @endforeach  --}}
                                {{-- @foreach($shipping_methods as $method)                                    
                                  <tr class="success">    
                                      <td>{{ Form::radio('shipping_method', $method->1) }}</td>
                                      <td>{{ ('shipping_method', $method->2) }}</td>
                                  </tr>       --}}

                                    <input type="radio" class="flat" name="shipping_method"  value="1" 
                                      {{-- {{ $shipping_methods->shipping_method == '1' ? 'checked' : '' }}  --}}
                                      >
                                      Standard Shipping $9.99 <br />

                                    <input type="radio" value="2" class="flat" name="shipping_method"
                                    {{-- {{ $shipping_methods->shipping_method == '2' ? 'checked' : '' }} --}}
                                     >
                                    Shipping with Tracking $19.99                    
                               {{-- @endforeach   --}}
                                 @endif 
                                  <li>@if ($cartItems->totalQuantity > 1)</span>Total Items<span> @else Total Item @endif <span>{{ $cartItems->totalQuantity}}</span></li>
                                  <li>Total <span>${{ $payment_info['price']}}</span></li>
                              </ul>
                              <a class="btn btn-default check_out" id="paypal-button" >Pay now</a>
                            </div>   
                                {{-- <ul> --}}
                                    {{-- <li class="hideElement"> Payment Status <span>{{$payment_info['status']}}</span></li> --}}
                                    {{-- <li> Quantity <span>{{$cartItems->totalQuantity}}</span></li> --}}
                                    {{-- <li> Shipping Cost <span>Free</span></li>
                                    <li> Total <span>{{$payment_info['price']}}</span></li>
                                </ul>
                                    <a class="btn btn-default update" href="{{ route('cartProducts') }}">Update</a>
                                    <a class="btn btn-default check_out" id="paypal-button" href="">Pay now</a> --}}
                              </div>      
                            </div>
                            <div class="form-two">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section> <!--/#payment-->

@endsection

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'AT7vRBK__Q5XBNSiDvvRrYSFnaK7hR8OcVpsoNamXB4RyLQTXyMKILQ3K5VMIIWQI2m4boHc5U8MYYQY',
      production: 'vindernonlinebusiness@business.com'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: "{{$payment_info['price']}}",
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Thank you for your purchase!');

        window.location = './paymentReceipt/'+data.paymentID+'/'+data.payerID;
        // window.location = "{{url('payment/paymentReceipt')}}"+"/"+data.paymentID+"/"+data.payerID;

      });
    }
  }, '#paypal-button');
</script>



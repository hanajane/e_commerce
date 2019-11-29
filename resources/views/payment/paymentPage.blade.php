
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
                          <h4> Account Details</h4> 
                          <ul>
                            <li>
                              <span class="h5">Checking Out as a : </span>{{ ucfirst(trans($payment_info['user_id'])) }}
                            </li>
                          </ul> 
                          <h4> Shipping/Bill To</h4>
                            <div class="">
                              <ul>
                                  <li><span class="h5">Name : </span>{{ ucfirst(trans($payment_info['first_name'])) }} {{ ucfirst(trans($payment_info['last_name']))}}</li>
                                  <li><span class="h5">Address : </span>{{ ucfirst(trans($payment_info['address_1'])) }} {{ $payment_info['address_2'] }} {{ ucfirst(trans($payment_info['city'])) }} <br /> {{ ucfirst(trans($payment_info['province_state'])) }}, {{ ucfirst(trans($payment_info['country'])) }} ({{ ucfirst(trans($payment_info['zip_postal'])) }})</li>
                              </ul>
                                <a class="btn btn-default update" onclick="history.go(-1);">Update Billing Info</a>
                            </div>
                            <div class="total_area">
                              <ul>
                                  <li>Payment Status
                                  @if($payment_info['status'] == 'on_hold')
                                    <span>not paid yet</span>
                                  @endif
                                  </li>
                                  <li>Shipping Cost <span>Free</span></li>
                                  <li>Total <span>{{$payment_info['price']}}</span></li>
                              </ul>
                              <a class="btn btn-default update" href="{{ route('cartProducts') }}">Update Cart</a>
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



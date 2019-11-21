
@extends('layouts.index')

@section('center')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{route('allProducts')}}">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-12 clearfix">
                        <div class="bill-to">
                            <p> Shipping/Bill To</p>
                            <div class="form-one">
                              <div class="total_area">
                                <ul>
                                    {{-- <li>Payment Status
                                    @if($payment_info['status'] == 'on_hold')

                                      <span>not paid yet</span>

                                    @endif
                                    </li>
                                    <li>Shipping Cost <span>Free</span></li>
                                    <li>Total <span>{{$payment_info['price']}}</span></li>
                                </ul>
                                <a class="btn btn-default update" href="">Update</a>
                                <a class="btn btn-default check_out" id="paypal-button" >
                                  </a>checkOutProducts --}}
                                <ul>
                                    <li class="hideElement"> Payment Status <span>{{$payment_info['status']}}</span></li>
                                    {{-- <li> Quantity <span>{{$cartItems->totalQuantity}}</span></li> --}}
                                    <li> Shipping Cost <span>Free</span></li>
                                    <li> Total <span>{{$payment_info['price']}}</span></li>
                                </ul>
                                    <a class="btn btn-default update" href="{{ route('cartProducts') }}">Update</a>
                                    <a class="btn btn-default check_out" id="paypal-button" href="">Pay now</a>
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




@extends('layouts.index')

@section('center')
   <div id="page-header" class="checkout">
        <div class="container">
            <div class="page-header-content text-center">
                <div class="page-header wsub">
                    <h1 class="page-title fadeInDown animated first">Billing Details</h1>
                </div><!-- / page-header -->
            </div><!-- / page-header-content -->
        </div><!-- / container -->
    </div><!-- / page-header -->
<!-- content -->

<!-- shopping-cart -->
<div id="checkout">
    <div class="container">
        <div class="row checkout-screen">
            <div class="col-sm-8 checkout-form">
                @if (Auth::check())
                    @else
                       <div class="row">
                           <div class="col-sm-6">
                                <p class="space-left have-account">Already have an account? <a href="/login" class="btn btn-link"><i class="lnr lnr-enter"></i><span>Login</span></a></p>
                           </div>
                        <div class="col-sm-6">
                            <p class="space-left have-account">Or create one! <a href="/register" class="btn btn-link"><i class="lnr lnr-enter"></i><span>Register</span></a></p>

                        </div>                    
                       </div>
                        @endif
                {{-- <p class="space-left have-account">Already have an account? <a href="login-register.html" class="btn btn-link"><i class="lnr lnr-enter"></i><span>Login</span></a></p> --}}
                    <form class="" action="{{ route('createNewOrder') }}" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="first_name" placeholder="*First name" required>
                                <input type="text" class="form-control" name="last_name" placeholder="*Last name" required>
                                <input type="email" class="form-control" name="email" placeholder="*Email" required>
                                
                            </div>
                            <div class="col-sm-6">
                                <input type="tel" class="form-control" name="phone" placeholder="*Phone" required>
                                <input type="text" class="form-control" name="address_1" placeholder="*Address" required>
                                <input type="text" class="form-control" name="address_2" placeholder="Address 2">
                            </div>
                        </div><!-- / row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="city" placeholder="*City" required>
                                <input type="text" class="form-control" name="state_province" placeholder="*Province / State" required>
                            </div>
                            
                            <div class="col-sm-6"> 
                                <input type="text" class="form-control" name="zip_postal" placeholder="vZip / Postatl" required>
                                </select>
                                <select class="form-control" name="country">
                                    <optgroup label="State:">
                                        <option value="canada">Canada</option>
                                        <option value="usa">USA</option>
                                        <option value="united kingdom">United Kingdom</option>
                                        <option value="mexico">Mexico</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div><!-- / row -->
                        <div class="checkout-form-footer space-left space-right">
                            <textarea class="form-control" name="message" placeholder="Message"></textarea>
                            <div class="row">
                                <div class="col">
                                <button class="btn btn-primary-filled btn-rounded" type="submit" name="submit" ><i class="lnr lnr-exit"></i><span>Confirm Order</span></button>
                                </div>
                            </div>
     
                        </div>
                        <!-- / checkout-form-footer -->
                    </form>
            </div><!-- / checkout-form -->

            <div class="col-sm-4 checkout-total">
                <ul>
                    <li><h4>Subtotal: <span>{{$cartItems->totalPrice}}</span></h4></li>
                    <li><h5>Total Item(s): <span>{{$cartItems->totalQuantity}}</h5></span></li>
                </ul>
                    <p style="font-size: 11px">* You get FREE shipping when you buy over $100 on products.<br />
                        The FREE shipping applies at the end of checkout.</p>
                <div class="cart-total-footer">
                    <a href="{{ route ('cartProducts') }}" class="btn btn-default-filled btn-rounded"><i class="lnr lnr-arrow-left"></i><span>Back to Cart</span></a>
                    <a href="{{ route ('allProducts') }}" class="btn btn-primary-filled btn-rounded"><i class="lnr lnr-cart"></i><span>Back to Shop</span></a>
                </div><!-- / cart-total-footer -->
            </div><!-- / checkout-total -->
        </div><!-- / row -->
    </div><!-- / container -->
</div>
<!-- / shopping-cart -->


{{-- <section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>

         @if(Auth::check())
       
            <div class="shopper-informations">
                <div class="row">
            
                    <div class="col-sm-12 clearfix">
                        <div class="bill-to">
                            <p> Shipping/Bill To</p>
                            <div class="form-one">
                                <form action="{{ route('createNewOrder') }}" method="post">
                                    {{csrf_field()}}
                                    <input type="text" name="first_name" placeholder="First Name *" required>
                                    <input type="text" name="last_name" placeholder="Last Name *" required>
                                    <input type="text" name="email" placeholder="Email *" required>
                                    <input type="text" name="phone" placeholder="Phone *"  required>
                                    <input type="text" name="address_1" placeholder="Address 1 *" required>
                                    <input type="text" name="address_2" placeholder="Address 2">
                                    <input type="text" name="city" placeholder="City *" required>
                                    <input type="text" name="state_province" placeholder="Province / state *" required>
                                    {{-- <input type="text" name="country" placeholder="country *" required> --}}
                                    {{-- <input type="text" name="zip_postal" placeholder="Zip / Postal Code *" required>

                                    <select type="text" name="country">
                                        <option>-- Country --</option>
                                        <option>United States</option>
                                        <option>Bangladesh</option>
                                        <option>UK</option>
                                        <option>India</option>
                                        <option>Pakistan</option>
                                        <option>Ucrane</option>
                                        <option>Canada</option>
                                        <option>Dubai</option>
                                    </select><br />
                                <button class="btn btn-default check_out" type="submit" name="submit" >Proceed To Payment</button>
                                </form>
                            </div>
                            <div class="form-two">
                            </div>
                        </div>
                    </div>
                           
                </div>
            </div>
    </div>
</section>  --}}
<!--/#cart_items-->

{{-- <section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping & Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>

                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <a class="btn btn-default update" href="{{route ('cartProducts')}}">Update</a>
                </div>
            </div>
        </div>

      @else
            <div class="alert alert-danger" role="alert">
            <strong>Please!</strong> <a href="{{route('login') }}">Log in</a> in order to create an order
            </div>
      @endif
    </div>
</section> --}}
<!--/#do_action-->

@endsection

@extends('layouts.index')

@section('center')
   <div id="page-header" class="checkout">
        <div class="container">
            <div class="page-header-content text-center">
                <div class="page-header wsub">
                    <h1 class="page-title fadeInDown animated first">Checkout</h1>
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
                <h4> Ship to this address?</h4>
                    <form class="" action="{{ route('createNewOrder') }}" method="post">
                        {{csrf_field()}}

                        <div class="col-sm-10 account-info">
                            <div id="personal-info" class="account-info-content">
                                <h4>Personal Info <span class="pull-right"></h4>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-8 col-md-10">
                                        <p>Full Name: <span name="first_name">{{ $userData->first_name }} </span><span name="last_name">{{ $userData->last_name }}<span></p>
                                        <p>Email: <span name="email">{{ $userData->email }}</span></p>
                                        <p>Phone: <span name="phone">{{ $userData->phone }}</span></p>
                                        <p>Address: <span name="address_1">{{ $userData->address_1 }}</span></p>
                                        <p>Address 2: <span name="address_2">{{ $userData->address_2 }}</span></p>
                                        <p>State / Province: <span name="state_province">{{ $userData->state_province }}</span></p>
                                        <p>City: <span name="city">{{ $userData->city }}</span></p>
                                        <p>ZIP Code: <span name="country">{{ $userData->zip_postal }}</span></p><p>Country: <span>{{ $userData->country }}</span></p>
                                    </div>
                                </div><!-- / row -->
                                <div class="row" style="display:none">
                                    <div class="col-xs-6 col-sm-8 col-md-10">
                                        <input for="first_name" class="input100" id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ $userData->first_name }}" required >
                                        <input for="last_name" class="input100" id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ $userData->last_name }}" required >
                                        <input for="email" class="input100" id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $userData->email }}" required >
                                        <input for="phone" class="input100" id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $userData->phone }}" required >
                                        <input for="address_1" class="input100" id="address_1" type="text" class="form-control{{ $errors->has('address_1') ? ' is-invalid' : '' }}" name="address_1" value="{{ $userData->address_1 }}" required >
                                        <input for="address_2" class="input100" id="address_2" type="text" class="form-control{{ $errors->has('address_2') ? ' is-invalid' : '' }}" name="address_2" value="{{ $userData->address_2 }}" required >
                                        <input for="state_province" class="input100" id="state_province" type="text" class="form-control{{ $errors->has('state_province') ? ' is-invalid' : '' }}" name="state_province" value="{{ $userData->state_province }}" required >
                                        <input for="city" class="input100" id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ $userData->city }}" required >
                                        <input for="zip_postal" class="input100" id="zip_postal" type="text" class="form-control{{ $errors->has('zip_postal') ? ' is-invalid' : '' }}" name="zip_postal" value="{{ $userData->zip_postal }}" required >
                                        <input for="country" class="input100" id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ $userData->country }}" required >
                                    </div>
                                </div><!-- / row -->
                            </div><!-- / personal-info -->
                            <textarea class="form-control" style="backgroud-color:red" name="message" placeholder="Message"></textarea>
                        </div><!-- / account-info -->
                        {{-- <div class="row">
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
                                        <option value="use">USA</option>
                                        <option value="united kingdom">United Kingdom</option>
                                        <option value="mexico">Mexico</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div><!-- / row --> --}}
                        <div class="checkout-form-footer space-left space-right">
                            <div class="row">
                                <div class="col-sm-6">
                                <button class="btn btn-primary-filled btn-rounded" type="submit" name="submit" ><i class="lnr lnr-exit"></i><span>Confirm Order</span></button>
                                </div>
                                <div class="update-cart col-sm-6">
                                    <button class="btn btn-default-filled btn-rounded" type="button"><i class="lnr lnr-sync"></i> <span>Update Info</span></button>
                                </div><!-- / update-cart -->
                            </div>
     
                        </div>
                        <!-- / checkout-form-footer -->
                    </form>
            </div><!-- / checkout-form -->

            <div class="col-sm-4 checkout-total">
                <ul>
                    <li><h4>Subtotal: <span>${{$cartItems->totalPrice}}</span></h4></li>
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





@extends('layouts.index')

@section('center')
@include('layouts.tab')
<hr />
    <div id="page-header" class="shopping-cart">
        <div class="container">
            <div class="page-header-content text-center">
                <div class="page-header wsub">
                    <h1 class="page-title fadeInDown animated first">Shopping Cart</h1>
                </div><!-- / page-header -->
            </div><!-- / page-header-content -->
        </div><!-- / container -->
    </div><!-- / page-header -->
    <!-- shopping-cart -->
<div id="shopping-cart">
    <div class="container">
        <!-- shopping cart table -->
        <table class="shopping-cart">
            <thead>
                <tr>
                    <th class="image">&nbsp;</th>
                    <th></th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems->items as $item)
                    <tr class="cart-item">
                        <td class="image">
                            <a href=""><img src="{{Storage::disk('local')->url('Images/'.$item['data']->image['image'])}}" alt="item" width="100" height="100"></a>
                        </td>
				        {{-- @foreach ($products as $product)
                            <td><a href="{!! route('singleProduct',$product->id) !!}"></a><h5>{{$item['data']['name']}}</h5>
                                <p>{{$item['data']['size']}}</p>
                            </td>
                        @endforeach --}}
                        
                            <td><a href=""><h5>{{$item['data']['name']}}</h5></a>
                                <p>{{$item['data']['size']}}</p>
                            </td>
                        <td>${{$item['data']['price']}}</td>
                        <td class="qty">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_down" href="{{ route('DecreaseSingleProduct',['id' => $item['data']['id']]) }}"> - </a>
                                    <input class="cart_quantity_input" type="text" name="quantity" value="{{$item['quantity']}}" autocomplete="off" size="2">
                                <a class="cart_quantity_up" href="{{ route('IncreaseSingleProduct',['id' => $item['data']['id']]) }}"> + </a>
                            </div>
                            {{-- <input type="number" step="1" min="0" name="cart" value="1" title="Qty" class="input-text qty text" size="4"> --}}
                        </td>
                        <td>{{$item['totalSinglePrice']}}</td>
                            <td class="remove">
                                <a class="btn btn-danger-filled x-remove" href="{{route('deleteItemFromCart',['id' => $item['data']['id']])}}"><i class="fa fa-times"></i></a>
                            </td>
                        {{-- <td class="remove"><a href="#x" class="btn btn-danger-filled x-remove">x</a></td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- / shopping cart table -->

        <div class="row cart-footer">
            {{-- <div class="update-cart col-sm-6">
                <button class="btn btn-default-filled btn-rounded" type="button"><i class="lnr lnr-sync"></i> <span>Update Cart</span></button>
            </div><!-- / update-cart --> --}}

            <div class="col-sm-6 cart-total">
                <h4>Cart Total</h4>
                {{-- <p>Subtotal: <span>${{$cartItems->totalPrice}}</span></p> --}}
                <p>Quantity: <span>{{$cartItems->totalQuantity}}</span></p>
                {{-- <p>Tax: <span>{Missing function}</span></p>
                <p>Shipping: <span>{Missing function}</span></p> --}}
                <h4>Subtotal: <span>${{$cartItems->totalPrice}}</span></h4>
            </div><!-- / cart-total -->

            <div class="col-sm-6 cart-checkout">
                {{-- @if (Auth::check()) --}}
                    <a href="{{ route('showPaymentPage') }}" class="btn btn-primary-filled btn-rounded"><i class="lnr lnr-exit"></i> <span>Proceed to Checkout</span></a>
                {{-- @else
                <a class="btn btn-primary-filled btn-rounded" onclick="history.go(+1);"><i class="lnr lnr-exit"></i> <span>Proceed to Checkout</span></a>
                @endif --}}
                <a href="{{ route('allProducts') }}" class="btn btn-default-filled btn-rounded"><i class="lnr lnr-cart"></i> <span>Continue Shopping</span></a>
                <div class="coupon cart-checkout">
                    <div class="input-group">
                        <input type="text" class="form-control rounded" id="coupon-code" placeholder="Coupon Code">
                        <span class="input-group-btn">
                            <button class="btn btn-primary-filled btn-rounded" type="button"><i class="lnr lnr-tag"></i> <span>Apply Coupon</span></button>
                        </span>
                    </div>
                </div><!-- / input-group -->
            </div><!-- / cart-checkout -->
        
        </div><!-- / row -->
    </div><!-- / container -->
</div>
<!-- / shopping-cart -->
@endsection


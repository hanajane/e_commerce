@extends('layouts.index')

@section('center')
<h1>cart items page</h1>
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{route('allProducts')}}">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                {{ $userData->name }}
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                @foreach ($cartItems->items as $item)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{Storage::disk('local')->url('product_images/'.$item['data']['image'])}}" alt="item" width="100" height="100"></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$item['data']['name']}}</a></h4>
                            <p>{{$item['data']['description']}}</p>
                            <p>{{$item['data']['id']}}</p>
                        </td>
                        <td class="cart_price">
                            <p>{{$item['data']['price']}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_down" href="{{ route('DecreaseSingleProduct',['id' => $item['data']['id']]) }}"> - </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{$item['quantity']}}" autocomplete="off" size="2">
                                <a class="cart_quantity_up" href="{{ route('IncreaseSingleProduct',['id' => $item['data']['id']]) }}"> + </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{$item['totalSinglePrice']}}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{route('deleteItemFromCart',['id' => $item['data']['id']])}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="row">
            <div class="col col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>{{$cartItems->totalPrice}}</span></li>
                        <li>Quantity <span>{{$cartItems->totalQuantity}}</span></li>
                        <li>GST<span></span></li>
                        <li>QST <span></span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>$61</span></li>
                    </ul>
                    {{-- <a class="btn btn-default check_out" href="{{ route('createOrder') }}">Check Out</a> --}}
                    <a class="btn btn-default check_out" href="{{ route('checkOutProducts') }}">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
@endsection


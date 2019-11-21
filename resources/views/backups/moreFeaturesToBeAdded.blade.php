@extends('layouts.index')

@section('center')
<div class="row">
    
    <div class="heading">
        <h3>What would you like to do next?</h3>
        <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
    </div>
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
</div>

				</div>

				<div class="row">
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="text-center">fetured Items</h2>
						@foreach ($products as $product)
							<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
								<div class="carousel-inner">
									<div class="item{{ $product->count() > 0 ? 'active' : '' }}">
										<div class="col-sm-3">
											<div class="product-image-wrapper">
												<div class="single-products">
													<div class="productinfo text-center">
														{{$product->id}}
														<img src="{{Storage::disk('local')->url('product_images/'.$product->image)}}" alt="product image" />
														<h2>{{$product -> price}}</h2>
														<p>{{$product -> name}}</p>
														<a href="{{route('AddToCartProduct',['id'=>$product->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								</a>
								<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
									<i class="fa fa-angle-right"></i>
								</a>
							</div>
						@endforeach
						        {{$products->links()}}
					</div><!--/recommended_items-->
                </div>
                


                						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.html" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                   <ul role="menu" class="sub-menu">
                                       <li><a href="shop.html">Products</a></li>
										<li><a href="product-details.html">Product Details</a></li>
										<li><a href="checkout.html">Checkout</a></li>
										<li><a href="cart.html">Cart</a></li>
										<li><a href="login.html">Login</a></li>
                                   </ul>
                               </li>
								<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                   <ul role="menu" class="sub-menu">
                                       <li><a href="blog.html">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
                                   </ul>
                               </li>
								<li><a href="404.html">404</a></li>
								<li><a href="contact-us.html">Contact</a></li>
                                    </ul>
                                    @endsection









/**********/


<div class="parent2 right2" onclick="">
    <div class="child2 bg-two">
        <a href="#">London</a>
    </div>
</div>

<style>
    .right2 {float: right !important;}
/* Image zoom on hover + Overlay colour */
.parent2 {
    width: 45%;
    margin: 20px;
    height: 300px;
    border: 1px solid blue;
    overflow: hidden;
    position: relative;
    float: left;
    display: inline-block;
    cursor: pointer;
}

.child2 {
    height: 100%;
    width: 100%;
    background-size: cover;
    background-repeat: no-repeat;
    -webkit-transition: all .5s;
    -moz-transition: all .5s;
    -o-transition: all .5s;
    transition: all .5s;
}

/* Several different images */
.bg-two {
    background-image: url(http://s1.it.atcdn.net/wp-content/uploads/2015/08/2-London.jpg);
}
.parent2 .child2 a {
    display: none;
    font-size: 35px;
    color: #ffffff !important;
    font-family: sans-serif;
    text-align: center;
    margin: auto;
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    height: 50px;
    cursor: pointer;
    /*text-decoration: none;*/
}

.parent2:hover .child2, .parent:focus .child2 {
    -ms-transform: scale(1.2);
    -moz-transform: scale(1.2);
    -webkit-transform: scale(1.2);
    -o-transform: scale(1.2);
    transform: scale(1.2);
}

.parent2:hover .child2:before, .parent2:focus .child2:before {
    display: block;
}

.parent2:hover a, .parent2:focus a {
    display: block;
}

.child2:before {
    content: "";
    display: none;
    height: 100%;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    background-color: rgba(52,73,94,0.75);
}

/* Media Queries */
@media screen and (max-width: 960px) {
    .parent {width: 100%; margin: 20px 0px}
        .wrapper {padding: 20px 20px;}
}
.hello {display: none}
    </style>
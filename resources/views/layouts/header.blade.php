<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home | E-Shopper</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('css/main.css')}}" rel="stylesheet">
	<link href="{{asset('css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="{{asset('shortcut icon')}}" href="images/ico/favicon.ico">
    <link rel="{{asset('apple-touch-icon-precomposed')}}" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="{{asset('apple-touch-icon-precomposed')}}" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="{{asset('apple-touch-icon-precomposed')}}" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="{{asset('apple-touch-icon-precomposed')}}" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@beachybodies.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<div class="btn-group">
									<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
										USA
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
										<li><a href="#">Canada</a></li>
										<li><a href="#">UK</a></li>
									</ul>
								</div>
								{{-- <li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li> --}}
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->

		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					{{-- <div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="{{asset('images/home/logo.png')}}" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									USA
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canada</a></li>
									<li><a href="#">UK</a></li>
								</ul>
							</div>

							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									DOLLAR
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canadian Dollar</a></li>
									<li><a href="#">Pound</a></li>
								</ul>
							</div>
						</div>
					</div> --}}
					<div class="col">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								{{-- <li><a href="#"><i class="fa fa-user"></i> Account</a></li> --}}
								{{-- <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li> --}}
                                @if (Auth::check())
								{{-- <li><a href="/home"><i class="fa fa-lock"></i> Profile</a></li> --}}
								<li class="dropdown"><a href="#">My account<i class="fa fa-angle-down fa fa-lock"></i></a>
                                   <ul role="menu" class="sub-menu">
									   <li><a href="{{ route('home') }}">Personal Info and Payments</a></li>
										<li><a href="login.html">Order History</a></li>
										<li><a href="product-details.html">Whishlist</a></li><br />
										<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
										{{ __('Logout') }}</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
									</li>
                              		</ul>
	                             </li>
                                    @else
                                    <li><a href="/login"><i class="fa fa-lock"></i> Login</a></li>
                                @endif
								<li><a href="{{route('cartProducts')}}"><i class="fa fa-shopping-cart"></i>
                                        @if(Session::has('cart'))
                                        <span class="cart-with-numbers">{‌{Session::get('cart')->totalQuantity}}</span>
                                        @endif
										Cart
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

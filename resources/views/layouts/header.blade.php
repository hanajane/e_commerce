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
	
	<!--theme-->
	<link rel="stylesheet" type="text/css" href="{{asset('loginFolder/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
	<link href='{{asset('fonts/FontAwesome.otf')}}' rel='stylesheet' type='text/css'>
	<link href="{{asset('css/linear-icons.css')}}" rel="stylesheet">
	<link href="{{asset('css/themeStyle.css')}}" rel="stylesheet">
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
							<ul class="nav nav-pills pull-right">
								<li class="dropdown w-image">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="{{asset('images/icons/eng.png')}}" alt=""> <span class="caret"></span></a>
									<ul class="dropdown-menu pulse animated">
										<li><a href="#"><img src="{{asset('images/icons/fr.png')}}" alt=""> FR</a></li>
										<li><a href="#"><img src="{{asset('images/icons/de.png')}}" alt=""> DE</a></li>
										<li><a href="#"><img src="{{asset('images/icons/es.png')}}" alt=""> ES</a></li>
									</ul>
								</li>
							</ul>
					</div>
				</div>
			</div>
		</div><!--/header_top-->

		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
                                @if (Auth::check())
								<li class="dropdown">
									<a ><i class="lnr lnr-user"></i> My account</a>
                                   	<ul role="menu" class="sub-menu">
									   <li><a href="{{ route('userProfile') }}">Personal Info and Payments</a></li>
										{{-- <li><a href="login.html">Order History</a></li>
										<li><a href="product-details.html">Whishlist</a></li><br /> --}}
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
                                    <li><a href="/login"><i class="lnr lnr-lock"></i> Login / Register</a></li>
                                @endif
								<li><a href="{{route('cartProducts')}}"><i class="lnr lnr-cart" style="font-size:19px;"></i>
                                        @if(Session::has('cart'))
										<span class="cart-with-numbers">{{Session::get('cart')->totalQuantity}}</span>
                                        @endif
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

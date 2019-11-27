{{-- <ul class="nav-tabs">
    <li class="{{ (request()->is('swimwear')) ? 'active' : '' }}"> <!-- active bar -->
        <a href="{{ route('swimwearProducts') }}">
            <i class="fa fa-flag"></i> <span>swimwear</span>
        </a>
    </li>
    <li class="{{ (request()->is('coverUps')) ? 'active' : '' }}"> <!-- active bar -->
        <a href="{{ route('coverUpProducts') }}">
            <i class="fa fa-heart"></i> <span>cover ups</span>
        </a>
    </li>
    <li class="{{ (request()->is('accessories')) ? 'active' : '' }}"> <!-- active bar -->
        <a href="{{ route('accessoryProducts') }}">
            <i class="fa fa-dollar"></i> <span>accessories</span>
        </a>
    </li>
</ul>
           --}}
        <div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row margin_bottom"> <!--class"pushDown"-->
					<div class="col-sm-8 bb_parent">
						<div class="logo pull-left">
							<a href="{{route ('homePage')}}"><img src="{{asset('images/home/beachyBody_logo.png')}}" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
							</div>
						</div>
					</div>
					
					<div class="col-sm-4 searchBig">
						<div class="search_box pull-right">
							<form action="search" method="GET">
								<input type="text" name="searchText" placeholder="Search"/>
							</form>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 searchBig">
						{{-- <div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div> --}}
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li class="{{ (request()->is('products')) ? 'headTab' : '' }}"><a href="{{route('allProducts')}}" class="panel-title">Shop All</a></li>
                                {{-- <li class="{{ (request()->is('swimwear')) ? 'headTab' : '' }}"><a href="{{route('swimwearProducts')}}" class="panel-title">Swimwears</a></li> --}}
								<li class="{{ (request()->is('swimwear')) ? 'headTab' : '' }} dropdown"><a href="{{route('swimwearProducts')}}" class="panel-title">Swimwear<i class="fa fa-angle-down"></i></a>
                                   <ul role="menu" class="sub-menu">
									   	<li class="{{ (request()->is('swimwear')) ? 'headTab' : '' }}"><a href="{{route('multiwayProducts')}}">Multi-Way</a></li>
										<li class="{{ (request()->is('swimwear')) ? 'headTab' : '' }}"><a href="{{route('monokiniProducts')}}">Monokini</a></li>
										<li class="{{ (request()->is('swimwear')) ? 'headTab' : '' }}"><a href="{{route('twoPieceProducts')}}">Two-piece</a></li>
										<li class="{{ (request()->is('swimwear')) ? 'headTab' : '' }}"><a href="{{route('onePieceProducts')}}">One-Piece</a></li>
										<li class="{{ (request()->is('swimwear')) ? 'headTab' : '' }}"><a href="{{route('highNeckProducts')}}">High-Neck</a></li>
										<li class="{{ (request()->is('swimwear')) ? 'headTab' : '' }}"><a href="{{route('longLineProducts')}}">Longline Bikini</a></li>
										<li class="{{ (request()->is('swimwear')) ? 'headTab' : '' }}"><a href="{{route('oneShoulderProducts')}}">One-Shoulder Top</a></li>
										<li class="{{ (request()->is('swimwear')) ? 'headTab' : '' }}"><a href="{{route('sportTopProducts')}}">Sport Top</a></li>
                              		</ul>
	                             </li>
                                <li class="{{ (request()->is('coverUps')) ? 'headTab' : '' }}"><a href="{{route('coverUpProducts')}}" class="panel-title">Cover ups</a></li>
                                <li class="{{ (request()->is('accessories')) ? 'headTab' : '' }}"><a href="{{route('accessoryProducts')}}" class="panel-title">Accessories</a></li>
                            </ul>
                        </div>
{{--						<div class="mainmenu pull-left">--}}
{{--							<ul class="nav navbar-nav collapse navbar-collapse">--}}
{{--								<li><a href="index.html" class="active">Home</a></li>--}}
{{--								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>--}}
{{--                                    <ul role="menu" class="sub-menu">--}}
{{--                                        <li><a href="shop.html">Products</a></li>--}}
{{--										<li><a href="product-details.html">Product Details</a></li>--}}
{{--										<li><a href="checkout.html">Checkout</a></li>--}}
{{--										<li><a href="cart.html">Cart</a></li>--}}
{{--										<li><a href="login.html">Login</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--								<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>--}}
{{--                                    <ul role="menu" class="sub-menu">--}}
{{--                                        <li><a href="blog.html">Blog List</a></li>--}}
{{--										<li><a href="blog-single.html">Blog Single</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--								<li><a href="404.html">404</a></li>--}}
{{--								<li><a href="contact-us.html">Contact</a></li>--}}
{{--							</ul>--}}
{{--						</div>--}}
					</div>
				
					<div class="row searchSmall">
						<div class="col navbar-header pull-right">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
                        <div class="mainmenu pull-right">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li class="{{ (request()->is('products')) ? 'headTab' : '' }}"><a href="{{route('allProducts')}}" class="panel-title">Shop All</a></li>
                                <li class="{{ (request()->is('swimwear')) ? 'headTab' : '' }}"><h4 class="panel-title"><a href="{{route('swimwearProducts')}}">Swimwears</a></h4></li>
								<li class="dropdown panel-title"><a href="#">Swimwears<i class="fa fa-angle-down"></i></a>
                                   <ul role="menu" class="sub-menu">
									   	<li class="{{ (request()->is('swimwear')) ? 'headTab' : '' }}"><a href="{{route('multiwayProducts')}}">Multi-Way</a></li>
										<li class="{{ (request()->is('swimwear')) ? 'headTab' : '' }}"><a href="{{route('monokiniProducts')}}">Monokini</a></li>
										<li class="{{ (request()->is('swimwear')) ? 'headTab' : '' }}"><a href="{{route('twoPieceProducts')}}">Two-piece</a></li>
										<li class="{{ (request()->is('swimwear')) ? 'headTab' : '' }}"><a href="{{route('onePieceProducts')}}">One-Piece</a></li>
										<li class="{{ (request()->is('swimwear')) ? 'headTab' : '' }}"><a href="{{route('highNeckProducts')}}">High-Neck</a></li>
										<li class="{{ (request()->is('swimwear')) ? 'headTab' : '' }}"><a href="{{route('longLineProducts')}}">Longline Bikini</a></li>
										<li class="{{ (request()->is('swimwear')) ? 'headTab' : '' }}"><a href="{{route('oneShoulderProducts')}}">One-Shoulder Top</a></li>
										<li class="{{ (request()->is('swimwear')) ? 'headTab' : '' }}"><a href="{{route('sportTopProducts')}}">Sport Top</a></li>
                              		</ul>
	                             </li>
                                <li class="{{ (request()->is('coverUps')) ? 'headTab' : '' }}"><h4 class="panel-title"><a href="{{route('coverUpProducts')}}">Cover ups</a></h4> </li>
                                <li class="{{ (request()->is('accessories')) ? 'headTab' : '' }}"><h4 class="panel-title"><a href="{{route('accessoryProducts')}}">Accessories</a></h4> </li>
                            </ul>
                        </div>
							<div class="col search_box pull-left">
								<form action="search" method="GET">
									<input type="text" name="searchText" placeholder="Search"/>
								</form>
							</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
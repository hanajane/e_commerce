
@extends('layouts.index')

@section('center')
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row pushDown">
					<div class="col bb_parent">
						<div class="logo pull-left">
							<a href="{{route('homePage')}}"><img src="{{asset('images/home/beachyBody_logo.png')}}" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
							</div>
						</div>
					</div>
					
					<div class="col">
						<div class="search_box pull-right">
							<form action="search" method="GET">
								<input type="text" name="searchText" placeholder="Search"/>
							</form>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{route('allProducts')}}" class="panel-title">Shop All</a></li>
                                <li><a href="{{route('swimwearProducts')}}" class="panel-title">Swimwears</a></li>
								<li class="dropdown panel-title"><a href="#" class="panel-title">Swimwears<i class="fa fa-angle-down"></i></a>
                                   <ul role="menu" class="sub-menu">
									   <li><a href="shop.html">Multi-Way</a></li>
										<li><a href="login.html">Monokini</a></li>
										<li><a href="product-details.html">Two-piece</a></li>
										<li><a href="checkout.html">One-Piece</a></li>
										<li><a href="cart.html">High-Neck</a></li>
										<li><a href="login.html">Longline Bikini</a></li>
										<li><a href="login.html">One-Shoulder Top</a></li>
										<li><a href="login.html">Sport Top</a></li>
                              		</ul>
	                             </li>
                                <li><a href="{{route('coverUpProducts')}}" class="panel-title">Cover ups</a></li>
                                <li><a href="{{route('accessoryProducts')}}" class="panel-title">Accessories</a></li>
                            </ul>
                        </div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<div class="container">
		@include('alert')
	</div>
	<div class="parallax1">
		<div class="caption">
  			<a href="{{route('swimwearProducts')}}"><span class="border">SHOP OUR SWIMWEAR</span></a>
  		</div>
	</div>
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
							<li data-target="#slider-carousel" data-slide-to="3"></li>
							<li data-target="#slider-carousel" data-slide-to="4"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1>One-Piece</h1>
									{{-- <h2>sub title</h2> --}}
									<p>Trendy Designs, Comfy Fabric. Find Your Fit. Fantastic for Everybody. Best Deals for Your Vacay.</p>
									<div type="button" class="cl-effect-15 get"><a href="" data-hover="Find yours!">Find yours!</a></div>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('images/covers/onePiece.jpg')}}" class="girl img-responsive" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1>Two-Piece</h1>
									<p>Explore the hottest styles in women's swimsuits from the beach to the pool. Mix and match to make your perfect two piece swimsuit. </p>
									<div type="button" class="cl-effect-15 get"><a href="" data-hover="Find yours!">Find yours!</a></div>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('images/covers/twoPiece.jpg')}}" class="girl img-responsive" alt="" />
								</div>
							</div>

							<div class="item">
								<div class="col-sm-6">
									<h1> Monokini</h1>
									<p>The very fashionable trend for this year is the sexy fashion monokini, which essentially is a one-piece cutout swimsuit.
									</p>
									<div type="button" class="cl-effect-15 get"><a href="" data-hover="Find yours!">Find yours!</a></div>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('images/covers/x/monokini.jpg')}}" class="girl img-responsive" alt="" />
								</div>
							</div>

							<div class="item">
								<div class="col-sm-6">
									<h1>Multiway</h1>
									<p>Our trendy and playful Multiway sets for lounging by the pool are made to help you look and feel great!
										Find a new swimsuit that can fit your every mood! Multiway, reversible, and versatile.</p>
									<div type="button" class="cl-effect-15 get"><a href="" data-hover="Find yours!">Find yours!</a></div>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('images/covers/x/string.jpg')}}" class="girl img-responsive" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1>Sport Bikini Tops</h1>
									<p>Our Sport Bikini Tops collections are made to move with your body while offering the support you need for your activities.
										We also have Sport Tops that offer more coverage than a traditional women's swim top.</p>
									<div type="button" class="cl-effect-15 get"><a href="" data-hover="Find yours!">Find yours!</a></div>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('images/covers/x/sport.jpg')}}" class="girl img-responsive" alt="" />
								</div>
							</div>

						</div>

						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>

				</div>
			</div>
		</div>
	</section><!--/slider-->
		<div class="parallax2">
			<div class="caption" style="text-align:right">
				<a href="{{route('coverUpProducts')}}"><span class="border">SHOP OUR COVERUPS</span></a>
			</div>
		</div>
	<section>
		<div class="container">
			<div class="row">
				{{-- <div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{route('swimwearProducts')}}">Swimwears</a></h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{route('coverUpProducts')}}">Cover ups</a></h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{route('accessoryProducts')}}">Accessories</a></h4>
                                </div>
                            </div>
						</div><!--/category-products-->

						{{-- <div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
									<li><a href="#"> <span class="pull-right">(56)</span>GrÃ¼ne Erde</a></li>
									<li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
									<li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
									<li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
									<li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
									<li><a href="#"> <span class="pull-right">(4)</span>RÃ¶sch creative culture</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->

						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->

						<div class="shipping text-center"><!--shipping-->
							<img src="{{asset('images/home/shipping.jpg')}}" alt="" />
						</div><!--/shipping-->
					</div>
				</div> --}}


{{-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
 
  <ol class="carousel-indicators">
   @foreach( $products as $product )
      <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
   @endforeach
  </ol>
 
  <div class="carousel-inner" role="listbox">
    @foreach( $products as $product )
	   <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
		{{$product->id}}
			<img src="{{Storage::disk('local')->url('product_images/'.$product->image)}}" alt="product image" />
              <div class="carousel-caption d-none d-md-block">
                 <h3>{{ $product->price }}</h3>
                 <p>{{ $product->name }}</p>
              </div>
       </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> --}}

				<div class="row featured">
					<div class="recommended_items"><!--fetured_items-->
						<div class="cl-effect-15">
							<h2 class="text-center"><a href="" data-hover="FEATURED ITEMS">FEATURED ITEMS</a></h2>
						</div>
					</div><!--/fetured_items-->
				</div>
	</section>
		<div class="parallax3">
			<div class="caption" style="text-align:left">
				<a href="{{route('accessoryProducts')}}"><span class="border">SHOP OUR ACCESSORIES</span></a>
			</div>
		</div>
	<section>
		<div class="shopNow-tab"><!--shopNow section-->
			<div class="tab-content">
				<div class="row">
					<div class="col">
						<div class="shopNow">
							<a href="{{route('allProducts')}}"><button class="button shopBtn"><h2>Shop Now</h2></button></a>
						</div>
					</div>
				</div>
			</div>
		</div><!--/shopNow section-->
					{{-- <div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{asset('images/home/recommend1.jpg')}}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{asset('images/home/recommend2.jpg')}}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{asset('images/home/recommend3.jpg')}}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{asset('images/home/recommend1.jpg')}}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{asset('images/home/recommend2.jpg')}}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{asset('images/home/recommend3.jpg')}}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
					</div><!--/recommended_items--> --}}

				</div>
			</div>
		</div>
	</section>
		<div class="parallax4">
			<div class="caption">
				<a href=""><span class="border">WHAT'S ON SALE?</span></a>
			</div>
		</div>
@endsection

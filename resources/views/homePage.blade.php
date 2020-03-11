
@extends('layouts.index')

@section('center')
@include('layouts.tab')

	<div class="container">
		@include('alert')
	</div>
	<div class="parallax1">
		<div class="caption">
  			<a href="{{route('swimwearProducts')}}"><span class="border">SHOP OUR SWIMWEAR</span></a>
  		</div>
	</div>
	<section id=""><!--slider // slider id deleted-->
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

						{{-- <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a> --}}
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
				<div class="row featured">
					<div class="recommended_items"><!--fetured_items-->
						<div class="cl-effect-15">
							<h2 class="text-center"><a href="{{route('allProducts')}}" data-hover="FEATURED ITEMS">FEATURED ITEMS</a></h2>
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
		</div>


	</section>
		<div class="parallax4">
			<div class="caption">
				<a href=""><span class="border">WHAT'S ON SALE?</span></a>
			</div>
		</div>
		<section id="features">
    <div class="container">
        <div class="row">
            <!-- feature-block -->
            <div class="col-md-4 feature-center">
                <div class="feature block">
                    <div class="feature-icon">
                        <i class="lnr lnr-gift"></i>
                    </div>
                    <h5>Free Shipping</h5>
                    <p>Free Worldwide shipping on $100 of purchase</p>
                </div>
            </div><!-- / col-md-4 -->
            <!-- / feature-block -->

            <!-- feature-block -->
            <div class="col-md-4 feature-center">
                <div class="feature block">
                    <div class="feature-icon">
                        <i class="lnr lnr-clock"></i>
                    </div>
                    <h5>Fast Delivery</h5>
                    <p>Ultra fast WoldWide delivery</p>
                </div>
            </div><!-- / col-md-4 -->
            <!-- / feature-block -->

            <!-- feature-block -->
            <div class="col-md-4 feature-center">
                <div class="feature block">
                    <div class="feature-icon">
                        <i class="lnr lnr-exit"></i>
                    </div>
                    <h5>Money Back</h5>
                    <p>Money back guarantee</p>
                </div>
            </div><!-- / col-md-4 -->
            <!-- / feature-block -->
        </div><!-- / row -->
    </div><!-- / container -->
</section>
@endsection

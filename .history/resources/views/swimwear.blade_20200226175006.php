
@extends('layouts.index')

@section('center')
@include('layouts.tab')
<!--slider-->
	<!-- shop 3col -->
	<section id="shop">
		<div class="page-header text-center wsub">
            <h1 class="title text-center">Swimwear</h1>
		</div><!--/ page-header -->
		<div class="container">
			<div id="grid" class="row">
				@foreach ($products as $product)
					<!-- product -->
					<div class="col-xs-6 col-md-4 product">
					<a href="{!! route('singleProduct',$product->id) !!}" class="product-link"></a>
						<!-- / product-link -->
							{{-- <img class="imageResp" src="{{Storage::disk('local')->url('Images/'.$product->image)}}" alt="product image" /> --}}
							<img class="imageResp" src="{{Storage::disk('local')->url('Images/'.$product->image->image)}}" alt="product image" />
							<!-- / product-image -->

							<!-- product-hover-tools -->
							<div class="product-hover-tools">
								<a href="{!! route('singleProduct',$product->id) !!}" class="view-btn">
									<i class="lnr lnr-eye"></i>
								</a>
								<a href="{{route('AddToCartProduct',['id'=>$product->id])}}" class="add-to-cart">
									<i class="lnr lnr-cart"></i>
								</a>
							</div><!-- / product-hover-tools -->

							<!-- product-details -->
							<div class="product-details">
								<h3 class="product-title">{{ $product->name }}</h3>
								<h6 class="product-price">{{$product->price }}</h6>
							</div><!-- / product-details -->
					</div><!-- / product -->
				@endforeach
                    {{-- {{$products->links()}} --}}
			
				<!-- grid-resizer -->
			<div class="col-xs-6 col-md-4 shuffle_sizer"></div>
			<!-- / grid-resizer -->
			</div><!-- / row -->
		</div><!-- / container -->
	</section>
	<!-- / shop 3col -->
<!-- / features section 3col -->
{{-- 
    <section>
        <div class="container">
            <div class="row">
                <div class="col bb_parent">
                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>
                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    @foreach ($products as $product)
                                        
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
							                        <img class="imageResp" src="{{Storage::disk('local')->url('Images/'.$product->image)}}" alt="product image" />
                                                    <h2>{{$product->price}}</h2>
                                                    <p>{{$product->name}}</p>
                                                    <a href="{{route('AddToCartProduct',['id'=>$product->id])}}" class="add-to-cart" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
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
                    </div><!--/recommended_items-->

                </div>
            </div>
        </div>
    </section> --}}
@endsection

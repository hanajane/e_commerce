
@extends('layouts.index')

@section('center')
@include('layouts.tab')
<!--slider-->
	<!-- shop 3col -->
	<section id="shop">
		<div class="page-header text-center wsub">
            <h1 class="title text-center">Cover Ups</h1>
		</div><!--/ page-header -->
		<div class="container">
			<div id="grid" class="row">
				@foreach ($products as $product)
					<!-- product -->
					<div class="col-xs-6 col-md-4 product">
					<a href="{!! route('singleProduct',$product->id) !!}" class="product-link"></a>
						<!-- / product-link -->
							<img class="imageResp" src="{{Storage::disk('local')->url('product_images/'.$product->image)}}" alt="product image" />
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
								<h6 class="product-price">{{ $product->price }}</h6>
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
@endsection

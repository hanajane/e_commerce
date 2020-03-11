
@extends('layouts.index')

@section('center')
@include('layouts.tab')
<!--slider-->
	<!-- shop 3col -->
	<section id="shop">
        
@extends('layouts.admin')

@section('body')

    <div class="table-responsive">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    <li>{!! print_r($errors->all()) !!}</li>
                </ul>
            </div>
        @endif

        <h2>Create New Product</h2>
        <form action="/admin/sendCreateProductForm" method="post" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Product Name" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="description" required>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class=""  name="image" id="image" required>
            </div>
            <div class="form-group">
                <label for="productType_id">Type</label>
                {{-- @foreach ($productType_info as $productType)
                    <select name="product_type" placeholder="type">
                        <option value="{{$productType->id}}" selected>{{$productType->type}}</option>
                    </select>
                @endforeach --}}
                <select class="form-control m-bot15" name="productType_id">
                    @if ($productType_info->count())
                        @foreach($productType_info as $productType)
                            <option value="{{ $productType->id }}" {{ $productType->id ? 'selected="selected"' : '' }}>{{ $productType->type }}</option>    
                    @endforeach
                    @endif
                </select>

                {{-- @foreach ($productType_info as $productType)
                <div>
                    <ul>
                        <li>{{$productType->id}}{{$productType->type}}hhhhhhhhhhhhhh
                        </li>
                    </ul>
                </div>
                    
                @endforeach --}}
            
                  {{-- <select name="cars">
    <option value="volvo">Volvo</option>
    <option value="saab">Saab</option>
    <option value="fiat">Fiat</option>
    <option value="audi">Audi</option>
  </select> --}}
                {{-- <label for="productType_id">Type</label>
                <input type="text" class="form-control" name="productType_id" id="productType_id" placeholder="type" required> --}}
            </div>

            <div class="form-group">
                <label for="type">Price</label>
                <input type="text" class="form-control" name="price" id="price" placeholder="price" required>
            </div>
            <div class="form-group">
                <label for="swimwearSize_id">Swimwear Size</label>
                    <select class="form-control m-bot15" name="productSize_id">
                        @if ($swimwearSize_info->count())
                            @foreach($swimwearSize_info as $swimwearSize)
                                <option value="{{ $swimwearSize->id }}" {{ $swimwearSize->id ? 'selected="selected"' : '' }}>{{ $swimwearSize->productSize }}</option>    
                        @endforeach
                        @endif
                    </select>
            </div>
            <div class="form-group">
                <label for="swimwearType_id">Swimwear Type</label>
                    <select class="form-control m-bot15" name="swimwearType_id">
                        {{-- <option value="">Not Applicable</option> --}}
                        @if ($swimwearType_info->count())
                            @foreach($swimwearType_info as $swimwearType)
                                <option value="{{ $swimwearType->id }}" {{ $swimwearType->id ? 'selected="selected"' : '' }}>{{ $swimwearType->swimwearType }}</option>    
                        @endforeach
                        @endif
                    </select>
            </div>
            {{-- <div class="form-group">
                <label for="type">Swimwear Type</label>
                <input type="text" class="form-control" name="swimwearType_id" id="size" placeholder="Swimwear Type" required>
            </div> --}}
            <div class="form-group">
                <label for="type">Hashtags</label>
                <input type="text" class="form-control" name="hashtags" id="Hashtags" placeholder="Hashtags" required>
            </div>
            <button type="submit" name="submit" class="btn btn-default">Submit</button>
        </form>

    </div>
@endsection

		<div class="page-header text-center wsub">
			<h2>Shop All</h2>
		</div><!--/ page-header -->
		<div class="container">
			<div class="wrapper">
				<div id="grid" class="row">
				@foreach ($data as $product)
					<!-- product -->
					<div class="col-xs-6 col-md-4 product">
					<a href="{!! route('singleProduct',$product->id) !!}" class="product-link"></a>
						<!-- / product-link -->
						{{-- @foreach ($image as $image) --}}
							<img class="imageResp" src="{{Storage::disk('local')->url('Images/'.$product->image->image)}}" alt="product image" /> <!--bug-->
						{{-- @endforeach --}}
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
					{{-- {{$data}} --}}
					     {{$data->links()}}
			
				<!-- grid-resizer -->
			<div class="col-xs-6 col-md-4 shuffle_sizer"></div>
			<!-- / grid-resizer -->
			</div><!-- / row -->
			</div>
		</div><!-- / container -->
	</section>
	<!-- / shop 3col -->
<!-- / features section 3col -->


						
@endsection

@extends('layouts.index')

@section('center')
@include('layouts.tab')
<hr />
    <div id="page-header" class="single-product">
        <div class="container">
            <div class="page-header-content text-center">
                <div class="page-header wsub">
                    <h1 class="page-title fadeInDown animated first">Single Product</h1>
                </div><!-- / page-header -->
            </div><!-- / page-header-content -->
        </div><!-- / container -->
    </div><!-- / page-header -->

    <!-- content -->

<!-- shop single-product -->
<section id="shop">
    <div class="container">
        <div class="row">

            <!-- product content area -->

            {{-- @foreach(App\Product::all() as $product)
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <img src= {{$product->imagePath}} alt="...">
            <div class="caption">
                <h3> {{$product->title}} </h3>
                <p class="discription"> {{$product->discription}} </p>
                <div class="clearfix">
                    <div class="pull-left price"/>$ {{$product->price}}</div>
                <a href= {{ route('product.addToCart', ['id' => $product->id ]) }} class="btn btn-danger pull-right" role="button">Add to cart</a>
            </div>
        </div>
    </div>
@endforeach --}}
            <div class="col-sm-6 col-md-7 content-area">
                <div class="product-content-area">
                    <div id="product-slider" class="carousel slide" data-ride="carousel">
                        <!-- wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
							<img src="{{Storage::disk('local')->url('product_images/'.$product->image)}}" alt="product image" />
                            </div>
                            <div class="item">
                                <img src="images/product-slide2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="images/product-slide3.jpg" alt="">
                            </div>
                        </div>
                        <!-- / wrapper for slides -->

                        <!-- controls -->
                        <a class="left carousel-control" href="#product-slider" role="button" data-slide="prev">
                            <span class="lnr lnr-chevron-left" aria-hidden="true"></span>
                        </a>
                        <a class="right carousel-control" href="#product-slider" role="button" data-slide="next">
                            <span class="lnr lnr-chevron-right" aria-hidden="true"></span>
                        </a>
                        <!-- / controls -->
                    </div><!-- / product-slider -->

                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#description" role="tab" data-toggle="tab" aria-expanded="true">Description</a></li>
                        <li class=""><a href="#info" role="tab" data-toggle="tab" aria-expanded="false">Product Info</a></li>
                        <li class=""><a href="#reviews" role="tab" data-toggle="tab" aria-expanded="false">Reviews (2)</a></li>
                    </ul>
                    <!-- / nav-tabs -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane animated fadeIn active" id="description">
                            <p>{!!$product->description!!}</p>
                        </div>
                        <!-- / description-tab -->

                        <div role="tabpanel" class="tab-pane animated fadeIn" id="info">
                            <div class="row">
                                <div class="col-sm-6">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th>Sizes:</th>
                                                <td>Small, Medium, Large</td>
                                            </tr>
                                            <tr>
                                                <th>Colors:</th>
                                                <td>Grey, Black, Blue</td>
                                            </tr>
                                            <tr>
                                                <th>Fabric:</th>
                                                <td>100% Cotton</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-sm-6">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th>Weight:</th>
                                                <td>0.34 Kg</td>
                                            </tr>
                                            <tr>
                                                <th>Made In:</th>
                                                <td>USA</td>
                                            </tr>
                                            <tr>
                                                <th>More Info:</th>
                                                <td>Fusce ipsum felis.</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- / row -->
                        </div>
                        <!-- / info-tab -->

                        <div role="tabpanel" class="tab-pane animated fadeIn" id="reviews">
                            <div class="reviews">
                                <div class="review-author pull-left">
                                  <img src="images/author1.jpg" alt="">
                                </div>
                                <div class="review-content">
                                    <h4 class="review-title no-margin">Simply the Best!</h4>
                                    <div class="review-stars">
                                        <span class="product-rating">
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                        </span>
                                    </div><!-- / review-stars -->
                                    <p>Aliquam pellentesque nisl nec ultricies scelerisque. Proin vel blandit magna. Class aptent taciti sociosqu.</p>
                                    <cite> - Johana Doe</cite>
                                </div><!-- / review-content -->

                                <div class="space-25">&nbsp;</div>

                                <div class="review-author pull-left">
                                  <img src="images/author2.jpg" alt="">
                                </div>
                                <div class="review-content">
                                    <h4 class="review-title no-margin">Good Product.</h4>
                                    <div class="review-stars">
                                        <span class="product-rating">
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i>
                                        </span>
                                    </div><!-- / review-stars -->
                                    <p>Vestibulum luctus justo justo, ac iaculis dolor luctus nec. In nec molestie mi. Praesent blandit interdum neque.</p>
                                    <cite> - Nicole Dowe</cite>
                                </div><!-- / review-content -->
                            </div><!-- / reviews -->
                        </div>
                        <!-- / reviews-tab -->
                    </div>
                    <!-- / tab-content -->
                </div><!-- / product-content-area -->

                <!-- add review -->
                <div id="add-review" class="space-top-30">
                    <h4>Leave a review</h4>
                    <div class="row">
                        <div class="col-sm-4 review-form">
                            <input type="text" class="form-control" placeholder="*Name" required>
                        </div>
                        <div class="col-sm-4 review-form">
                            <input type="email" class="form-control" placeholder="*Email" required>
                        </div>
                        <div class="col-sm-4 review-form">
                            <select class="form-control">
                                <option>5 Stars</option>
                                <option>4 Stars</option>
                                <option>3 Stars</option>
                                <option>2 Stars</option>
                                <option>1 Star</option>
                            </select>
                        </div>
                        <div class="col-sm-12 review-form">
                            <textarea rows="7" class="form-control" placeholder="*Review" required></textarea>
                            <button type="submit" class="btn btn-submit btn-primary-filled btn-rounded">Submit Review</button>
                        </div>
                    </div><!-- / row -->
                </div>
                <!-- / add review -->

                <!-- product pagination -->
                <div class="pagination no-padding">
                    <a href="#x" class="btn btn-default btn-rounded no-margin"><i class="fa fa-long-arrow-left"></i><span>Previous</span></a>
                     <a href="#x" class="btn btn-default btn-rounded no-margin pull-right"><span>Next</span><i class="fa fa-long-arrow-right"></i></a>
                </div><!-- / product pagination -->       

            </div>
            <!-- / project-content-area -->

            <!-- project sidebar area -->
            <div class="col-sm-6 col-md-5 product-sidebar">
                <div class="product-details">
                    <h4>{!!$product->name!!}</h4>
                    <p>{!!$product->description!!}</p>
                    <h4 class="space-top-30">Product Info</h4>
                    <div class="product-info">
                        <div class="info">
                            <p><i class="lnr lnr-tag"></i><span>Price: {!!$product->price!!}</span></p>
                        </div>
                        <div class="info">
                            <p><i class="lnr lnr-heart"></i><span>Category: <a href="#"> {!!$product->productType_id!!}</a></span></p>
                        </div>
                        <div class="info">
                            <p><i class="lnr lnr-menu"></i><span>SKU: {!!$product->id!!}</span></p>
                        </div>
                        <div class="info">
                            <p><i class="lnr lnr-star"></i><span>Reviews: <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i></span></p>
                        </div>
                    </div><!-- / project-info -->

                    <div class="buy-product">
                        <div class="options">
                            <input type="number" step="1" min="0" name="cart" value="1" title="Qty" class="input-text qty text"size="4">
                            <span class="selectors">
                                {{-- @foreach ($collection as $item) --}}
                                <select class="selectpicker">
                                    <optgroup label="Size:">
                                        <option>Small</option>
                                        <option>Medium</option>
                                        <option>Large</option>
                                    </optgroup>
                                </select>
                                    
                                {{-- @endforeach --}}
                                <select class="selectpicker two">
                                    <optgroup label="Color:">
                                        <option>Grey</option>
                                        <option>Black</option>
                                        <option>Blue</option>
                                    </optgroup>
                                </select>
                            </span>
                        </div>
                        <!-- / options -->

                        <div class="space-25">&nbsp;</div>

                        <a href="{{route('AddToCartProduct',['id'=>$product->id])}}" class="btn btn-primary-filled btn-rounded"><i class="lnr lnr-cart"></i><span> Add to Cart</span></a>
                        <a href="{{route('checkOutProducts')}}" class="btn btn-success-filled btn-rounded"><i class="lnr lnr-heart"></i><span> Buy Now</span></a>
                    </div>

                    <div class="info-buttons">
                        <a href="#add-review" class="page-scroll btn btn-default btn-rounded"><i class="lnr lnr-star"></i><span> Leave a review</span></a>
                        {{-- <a href="contact.html" class="btn btn-primary btn-rounded"><i class="lnr lnr-phone-handset"></i><span> Contact Us</span></a> --}}
                    </div><!-- / info-buttons -->

                </div><!-- product-details -->

            </div><!-- / col-sm-4 col-md-3 -->
            <!-- / project sidebar area -->

        </div><!-- / row -->

        <div id="related-products">
            <h4 class="space-left space-bottom-30">Related Products</h4>
            <div class="row">

                <!-- product -->
                <div class="col-xs-6 col-md-3 product">
                    <span class="sale-label">SALE</span>
                    <a href="single-product.html" class="product-link"></a>
                    <!-- / product-link -->
                    <img src="images/f-product.jpg" alt="">
                    <!-- / product-image -->

                    <!-- product-hover-tools -->
                    <div class="product-hover-tools">
                        <a href="single-product.html" class="view-btn">
                            <i class="lnr lnr-eye"></i>
                        </a>
                        <a href="shopping-cart.html" class="add-to-cart">
                            <i class="lnr lnr-cart"></i>
                        </a>
                    </div><!-- / product-hover-tools -->

                    <!-- product-details -->
                    <div class="product-details">
                        <h3 class="product-title">Women's Shirt</h3>
                        <h6 class="product-price"><del>$49</del> <span class="sale-price">$29</span></h6>
                    </div><!-- / product-details -->
                </div><!-- / product -->

                <!-- product -->
                <div class="col-xs-6 col-md-3 product">
                    <a href="single-product.html" class="product-link"></a>
                    <!-- / product-link -->
                    <img src="images/f-product.jpg" alt="">
                    <!-- / product-image -->

                    <!-- product-hover-tools -->
                    <div class="product-hover-tools">
                        <a href="single-product.html" class="view-btn">
                            <i class="lnr lnr-eye"></i>
                        </a>
                        <a href="shopping-cart.html" class="add-to-cart">
                                <i class="lnr lnr-cart"></i>
                        </a>
                    </div><!-- / product-hover-tools -->

                    <!-- product-details -->
                    <div class="product-details">
                        <h3 class="product-title">Women's Shirt</h3>
                        <h6 class="product-price">$99</h6>
                    </div><!-- / product-details -->
                </div><!-- / product -->

                <!-- product -->
                <div class="col-xs-6 col-md-3 product">
                    <a href="single-product.html" class="product-link"></a>
                    <!-- / product-link -->
                    <img src="images/f-product.jpg" alt="">
                    <!-- / product-image -->

                    <!-- product-hover-tools -->
                    <div class="product-hover-tools">
                        <a href="single-product.html" class="view-btn">
                            <i class="lnr lnr-eye"></i>
                        </a>
                        <a href="shopping-cart.html" class="add-to-cart">
                            <i class="lnr lnr-cart"></i>
                        </a>
                    </div><!-- / product-hover-tools -->

                    <!-- product-details -->
                    <div class="product-details">
                        <h3 class="product-title">Women's Shirt</h3>
                        <h6 class="product-price">$29</h6>
                    </div><!-- / product-details -->
                </div><!-- / product -->

                <!-- product -->
                <div class="col-xs-6 col-md-3 product">
                    <a href="single-product.html" class="product-link"></a>
                    <!-- / product-link -->
                    <img src="images/f-product.jpg" alt="">
                    <!-- / product-image -->

                    <!-- product-hover-tools -->
                    <div class="product-hover-tools">
                        <a href="single-product.html" class="view-btn">
                            <i class="lnr lnr-eye"></i>
                        </a>
                        <a href="shopping-cart.html" class="add-to-cart">
                            <i class="lnr lnr-cart"></i>
                        </a>
                    </div><!-- / product-hover-tools -->

                    <!-- product-details -->
                    <div class="product-details">
                        <h3 class="product-title">Women's Shirt</h3>
                        <h6 class="product-price">$39</h6>
                    </div><!-- / product-details -->
                </div><!-- / product -->

            </div><!-- / row -->
        </div><!-- / related-products -->
    </div><!-- / container -->
</section>
<!-- / shop single-product -->

<!-- / content -->
@endsection
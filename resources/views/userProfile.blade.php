    
@extends('layouts.index')

@section('center')
@include('layouts.tab')
<hr />
    <div id="page-header" class="my-account">
        <div class="container">
            <div class="page-header-content text-center">
                <div class="page-header wsub">
                    <h1 class="page-title fadeInDown animated first">My Account</h1>
                </div><!-- / page-header -->
            </div><!-- / page-header-content -->
        </div><!-- / container -->
    </div><!-- / page-header -->
    <!-- content -->

<!-- my-account -->
<section id="my-account">
    <div class="container">
        <div class="row">
            <div class="col-sm-2 account-sidebar">
                <p><a href="#personal-info" class="page-scroll">Personal Info</a></p>
                <p><a href="#shipping-info" class="page-scroll">Shipping Info</a></p>
                <p><a href="#my-orders" class="page-scroll">My Orders</a></p>
                <p><a href="#my-reviews" class="page-scroll">My Reviews</a></p>
                <p><a href="#wishlist" class="page-scroll">Wishlist</a></p>
            </div><!-- / account-sidebar -->
            <div class="col-sm-10 account-info">
                <div id="personal-info" class="account-info-content">
                    <h4>Personal Info <span class="pull-right"><a href="#x" class="btn btn-sm btn-default btn-rounded no-margin"><i class="lnr lnr-pencil"></i><span>Edit</span></a></span></h4>
                    <div class="row">
                        <div class="col-xs-6 col-sm-8 col-md-10">
                            <p>Full Name: <span>{{ $userData->name }} {{ $userData->lastName }}<span></p>
                            <p>Country: <span>{{ $userData->country }}</span></p>
                            <p>Email: <span>{{ $userData->email }}</span></p>
                            <p>Phone: <span>{{ $userData->phone }}</span></p>
                        </div>

                    </div><!-- / row -->
                </div><!-- / personal-info -->

                <div id="shipping-info" class="account-info-content">
                    <h4>Shipping Info <span class="pull-right"><a href="#x" class="btn btn-sm btn-default btn-rounded no-margin"><i class="lnr lnr-pencil"></i><span>Edit</span></a></span></h4>
                    <p>Country: <span>{{ $userData->country }}</span></p>
                    <p>State: <span>{{ $userData->name }}</span></p>
                    <p>City: <span>Miami</span></p>
                    <p>Address Line: <span>S Miami Ave, SW 20th, Suite 3864</span></p>
                    <p>ZIP Code: <span>33222</span></p>
                    <div class="account-info-footer"><a href="#x" class="btn btn-sm btn-default btn-rounded no-margin"><i class="fa fa-plus"></i><span>Add New Address</span></a></div>
                </div><!-- / shipping-info -->

                <div id="my-orders" class="account-info-content">
                    <h4>My Orders <span class="pull-right"><a href="#x" class="btn btn-sm btn-default btn-rounded no-margin"><i class="lnr lnr-pencil"></i><span>Edit</span></a></span></h4>
                    <p><a href="#x">Order #38726</a> <span>- Paid & Shipped</span> - Tracking No: <span>#TRCK182736</span></p>
                    <p><a href="#x">Order #34823</a> <span>- Completed on 25.10.2016</span></p>
                    <p><a href="#x">Order #23463</a> <span>- Completed on 16.08.2016</span></p>
                </div><!-- / my-orders -->

                <div id="my-reviews" class="account-info-content">
                    <h4>My Reviews <span class="pull-right"><a href="#x" class="btn btn-sm btn-default btn-rounded no-margin"><i class="lnr lnr-pencil"></i><span>Edit</span></a></span></h4>
                    <p><a href="#x">Order #38726</a> - <span>Review: <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i></span></p>
                    <p><a href="#x">Order #34823</a> - <span>Review: <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i></span></p>
                    <p><a href="#x">Order #23463</a> - <span>Review: <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></span></p>
                </div><!-- / my-reviews -->

                <div id="wishlist" class="account-info-content">
                    <h4>Wishlist <span class="pull-right"><a href="#x" class="btn btn-sm btn-default btn-rounded no-margin"><i class="lnr lnr-pencil"></i><span>Edit</span></a></span></h4>
                    <p><a href="#x">Product 1</a> - <span>Price: $29</span></p>
                    <p><a href="#x">Product 2</a> - <span>Price: $59</span></p>
                    <p><a href="#x">Product 3</a> - <span>Price: $69</span></p>
                </div><!-- / wishlist -->

            </div><!-- / account-info -->

        </div><!-- / row -->
    </div><!-- / container -->
</section>
<!-- / my-account -->

<!-- / content -->

@endsection

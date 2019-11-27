@extends('layouts.admin')

@section('body')

    <div class="table-responsive">
        <form action="/admin/updateProduct/{{$product->id}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Product Name" value="{{$product->name}}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="description" value="{{$product->description}}" required>
            </div>


            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" class="form-control" name="type" id="type" placeholder="type" value="{{$product->type}}" required>
{{--                {{!!Form::select('size', array('L' => 'Large', 'S' => 'Small'))}}--}}
            </div>
            <div class="form-group">
                <label for="type">Price</label>
                <input type="text" class="form-control" name="price" id="price" placeholder="price" value="{{$product->price}}" required>
            </div>
            <div class="form-group">
                <label for="type">Size</label>
                <input type="text" class="form-control" name="size" id="size" placeholder="size" value="{{$product->size}}" required>
            </div>
            <div class="form-group">
               {{--  <ul class="nav navbar-nav collapse navbar-collapse">
                    <li class="dropdown panel-title"><a href="#" class="panel-title">swimwear type<i class="fa fa-angle-down"></i></a> --}}
                        {{-- @foreach ($products as $product)
                            <ul role="menu" class="sub-menu">
                                <li><a href="shop.html">{{$product->swimwearType_id}}</a></li>
                                {{-- <li><a href="login.html">Monokini</a></li>
                                <li><a href="product-details.html">Two-piece</a></li>
                                <li><a href="checkout.html">One-Piece</a></li>
                                <li><a href="cart.html">High-Neck</a></li>
                                <li><a href="login.html">Longline Bikini</a></li>
                                <li><a href="login.html">One-Shoulder Top</a></li>
                                <li><a href="login.html">Sport Top</a></li> --}}
                            {{-- </ul> --}}
                        {{-- @endforeach --}} 
                            {{-- <ul role="menu" class="sub-menu">
                                <li><a href="shop.html"></a></li>
                                <li><a href="login.html">Monokini</a></li>
                                <li><a href="product-details.html">Two-piece</a></li>
                                <li><a href="checkout.html">One-Piece</a></li>
                                <li><a href="cart.html">High-Neck</a></li>
                                <li><a href="login.html">Longline Bikini</a></li>
                                <li><a href="login.html">One-Shoulder Top</a></li>
                                <li><a href="login.html">Sport Top</a></li>
                            </ul> --}}
                        {{-- </li>
                    <li><a href="{{route('coverUpProducts')}}" class="panel-title">Cover ups</a></li>
                    <li><a href="{{route('accessoryProducts')}}" class="panel-title">Accessories</a></li>
                </ul> --}}
                <label for="type">swimwear type</label>
                <input type="text" class="form-control" name="swimwearType_id" id="price" placeholder="swimwear type" value="{{$product->v}}" required>
            </div>
            <div class="form-group">
                <label for="type">Hashtags</label>
                <input type="text" class="form-control" name="hashtags" id="price" placeholder="hashtags" value="{{$product->v}}" required>
            </div>
            <button type="submit" name="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
@endsection

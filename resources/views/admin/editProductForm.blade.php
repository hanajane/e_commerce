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
                <label for="type">Hashtags</label>
                <input type="text" class="form-control" name="hashtags" id="price" placeholder="hashtags" value="{{$product->v}}" required>
            </div>
            <button type="submit" name="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
@endsection

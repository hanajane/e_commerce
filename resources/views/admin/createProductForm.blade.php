
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
{{--                <div class="btn-group">--}}
{{--                    <div class="btn-group">--}}
{{--                        <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            Select One--}}
{{--                            <span class="caret"></span>--}}
{{--                        </button>--}}
{{--                        <ul class="dropdown-menu">--}}
{{--                            <li><a href="#">Canada</a></li>--}}
{{--                            <li><a href="#">UK</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <label for="type">Type</label>
                <input type="text" class="form-control" name="type" id="type" placeholder="type" required>
            </div>

            <div class="form-group">
                <label for="type">Price</label>
                <input type="text" class="form-control" name="price" id="price" placeholder="price" required>
            </div>
            <div class="form-group">
                <label for="type">Size</label>
                <input type="text" class="form-control" name="size" id="size" placeholder="size" required>
            </div>
            <div class="form-group">
                <label for="type">Swimwear Type</label>
                <input type="text" class="form-control" name="swimwearType_id" id="size" placeholder="Swimwear Type" required>
            </div>
            <div class="form-group">
                <label for="type">Hashtags</label>
                <input type="text" class="form-control" name="hashtags" id="Hashtags" placeholder="Hashtags" required>
            </div>
            <button type="submit" name="submit" class="btn btn-default">Submit</button>
        </form>

    </div>
@endsection

@extends('layouts.admin')

@section('body')
@if($userData->admin_level == 1)
    <div class="table-responsive">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    <li>{!! print_r($errors->all()) !!}</li>
                </ul>
            </div>
        @endif
        <h3>Current Image</h3>
        <div><img src="{{asset ('storage')}}/Images/{{$product['image']}}" width="100" height="100" style="max-height:220px" ></div>
        <form action="{{ route('adminUpdateProductImage',['id' => $product->id ])}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="form-group">
                <label for="description">Update Image</label>
                <input type="file" class=""  name="image" id="image" placeholder="Image" value="{{$product->image}}" required>
            </div>
            <button type="submit" name="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
    @else
        <div class="alert alert-danger"><p>Only Higher Admins can edit products</p></div>
    @endif
@endsection

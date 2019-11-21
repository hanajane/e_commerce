@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>{!! Auth::user()->name !!}</h1>
                    <p>E-mail : {!! Auth::user()->email !!}</p>

                    <a href="{{ route('homePage')}}"  class="btn btn-warning">Main Website</a>{{--we dont have the route for delete because we dont need a page where we redirect to delete data as edits--}}
                    @if($userData->isAdmin())
                    <a href="{{ route('adminDisplayProducts')}}"  class="btn btn-warning">Admin Dashboard</a>{{--if the current user is an admin, it redirects to the adminDisplayProducts page--}}
                    @else
                    <a href="{{ route('homePage')}}"class="btn btn-warning">NOt an admin</a>{{--if the current user is not an admin, redirect to this page--}}
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!--old version-->

{{-- @extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>{!! Auth::user()->name !!}</h1>
                    <p>E-mail : {!! Auth::user()->email !!}</p>

                    <a href="{{ route('homePage')}}"  class="btn btn-warning">Main Website</a>{{--we dont have the route for delete because we dont need a page where we redirect to delete data as edits--}}
                   {{-- @if($userData->isAdmin())
                    <a href="{{ route('adminDisplayProducts')}}"  class="btn btn-warning">Admin Dashboard</a>{{--if the current user is an admin, it redirects to the adminDisplayProducts page--}}
                   {{-- @else
                    <a href="{{ route('homePage')}}"class="btn btn-warning">NOt an admin</a>{{--if the current user is not an admin, redirect to this page--}}
                       {{-- @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

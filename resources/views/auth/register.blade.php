<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="icon" type="image/png" href="{{asset('loginFolder/images/icons/favicon.ico')}}"/>

	<link rel="stylesheet" type="text/css" href="{{asset('loginFolder/vendor/bootstrap/css/bootstrap.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('loginFolder/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('loginFolder/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('loginFolder/vendor/animate/animate.css')}}">
	
	<link rel="stylesheet" type="text/css" href="{{asset('loginFolder/vendor/css-hamburgers/hamburgers.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('loginFolder/vendor/select2/select2.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('loginFolder/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('loginFolder/css/main.css')}}">

</head>
@extends('layouts.app')

@section('content')
    <div class="card-header">{{ __('Register') }}</div>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('{{asset('loginFolder/images/bg.jpg')}}');">
			<div class="wrap-login100 p-t-190 p-b-30">
					<form  class="login100-form validate-form" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Name is required">
						<input for="name" class="input100" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="{{ __('Name') }}" required autofocus>
							@if ($errors->has('name'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
							@endif
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Email is required">
						<input for="email" class="input100" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('E-mail Address') }}" required autofocus>
							@if ($errors->has('email'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
							@endif
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope"></i>
						</span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input for="password" class="input100" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" required>
							@if ($errors->has('password'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
							@endif
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>
                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Confirm Password">
						<input for="password-confirm" class="input100" id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>
					<div class="container-login100-form-btn p-t-10">
						<button type="submit" class="login100-form-btn">
                                    {{ __('Register') }}
						</button>
					</div>
					<div class="text-center w-full p-t-25 p-b-230">
						<a class="txt1" href="{{ route('login') }}">
                                    {{ __('Already have an account?') }}
						</a>
					</div>
				</form>
			</div>
		</div>
    </div>
    
    <script src="{{asset('loginFolder/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('loginFolder/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('loginFolder/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('loginFolder/vendor/select2/select2.min.js')}}"></script>
	<script src="{{asset('loginFolder/js/main.js')}}"></script>
{{-- @endsection --}}

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
{{--@extends('layouts.app') --}}
    {{-- <div class="card-header">{{ __('Login') }}</div> --}}
	<div class="limiter">
		<div class="container-login100" style="background-image: url('{{asset('loginFolder/images/bg.jpg')}}');">
			<div class="form">
				
				<div class="wrapper">
					<h2>Secure Checkout</h2>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="sub_title">
							<h5>I'm a new costumer</h5>
						</div>
						<p>Register with us for a faster checkout and more. You can also checkout as a guest.</p>
							<div class="container-login100-form-btn p-t-10">
								<a class="txt1" href="{{route('checkOutGuestProducts')}}"><button class="login100-form-btn">
									Continue as a Guest</button>		
								</a>
							</div><br />
							<div class="container-login100-form-btn p-t-10">
								<p>Create an account with us and you'll be able to:
									<ul>
										<li><i class="fa fa-long-arrow-right"></i>	Check out faster</li>
										<li><i class="fa fa-long-arrow-right"></i>	Save multiple shipping addresses</li>
										<li><i class="fa fa-long-arrow-right"></i>	Access your order history</li>
										<li><i class="fa fa-long-arrow-right"></i>	Track new orders</li>
										<li><i class="fa fa-long-arrow-right"></i>	Save items to your wish list</li>
									</ul>
								</p>
								<a class="txt1" href="{{route('register')}}"><button class="login100-form-btn">
									Create a new accounts</button>		
								</a>
							</div>
					</div>
					<div class="col-sm-6">
						<div class="sub_title">
							<h5>I already have an account</h5>
						</div>
						<div class="">
							<p>To continue, Please enter your E-mail address and password
						</div>
							<form  class="login100-form validate-form" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
								@csrf
							{{-- <div class="login100-form-avatar">
								<img src="{{asset('loginFolder/images/avatar-01.jpg')}}" alt="AVATAR">
							</div> 
							<span class="login100-form-title p-t-20 p-b-45">
								John Doe
							</span> --}}

							<div class="wrap-input100 validate-input m-b-10" data-validate = "Email is required">
								<input for="email" class="input100" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required autofocus>
									@if ($errors->has('email'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
							</div>

							<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
								<input for="password" class="input100" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" required>
									@if ($errors->has('password'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
									@endif
							</div>
							<div class="form-group row">
								<div class="col">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

										<label class="form-check-label" for="remember">
											{{ __('Remember me') }}
										</label>
									</div>
								</div>
							</div>

							<div class="container-login100-form-btn p-t-10">
								<button class="login100-form-btn">
									{{ __('Login') }}
								</button>
							</div>

							<div class="text-center w-full p-t-25 p-b-230">
								<a class="txt1" href="{{ route('password.request') }}">
									{{ __('Forgot Username / Password?') }}
								</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
    </div>
    
    <script src="{{asset('loginFolder/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('loginFolder/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('loginFolder/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('loginFolder/vendor/select2/select2.min.js')}}"></script>
	<script src="{{asset('loginFolder/js/main.js')}}"></script>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('loginFolder') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
{{-- @endsection --}}

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel='stylesheet' type='text/css' href='{{asset('fonts/FontAwesome.otf')}}' >	
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
{{-- @extends('layouts.app')

@section('content') --}}
    {{-- <div class="card-header">{{ __('Register') }}</div> --}}
	<div class="limiter">
		<div class="container-login100" style="background-image: url('{{asset('loginFolder/images/bg.jpg')}}');">
			{{-- <div class="wrap-login100 p-t-190 p-b-30"> --}}
			<div class="form">
				<div class="wrapper">
					<h2>Create an Accout</h2>
					<p>Checkout faster at Beachy Bodies and save multiple addresses in your address book.</p>
				</div>
					<form  class="login100-form validate-form" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

						<div class="row">
							<div class="col">
								<div class="">
									<h5>Personal Details</h5>
								</div>
								<div class="wrap-input100 validate-input m-b-10" data-validate = "Email is required">
									<input for="email" class="input100" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('E-mail Address') }}" required autofocus>
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
								<div class="wrap-input100 validate-input m-b-10" data-validate = "Confirm Password">
									<input for="password-confirm" class="input100" id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required>
									
								</div>
								<div class="wrap-input100 validate-input m-b-10" data-validate = "Confirm Phone">
									<input for="phone-confirm" class="input100" id="phone-confirm" type="text" class="form-control" name="phone" placeholder="{{ __('phone') }}">
									
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="">
								<h5>Shipping Details</h5>
							</div>
							<div class="wrap-input100 validate-input m-b-10" data-validate = "Name is required">
								<input for="name" class="input100" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="{{ __('First name') }}" required autofocus>
									@if ($errors->has('name'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('name') }}</strong>
										</span>
									@endif
							
							</div>
							<div class="wrap-input100 validate-input m-b-10" data-validate = "Last Name is required">
								<input for="last_name" class="input100" id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" placeholder="{{ __('Last name') }}" required autofocus>
									@if ($errors->has('name'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('last_name') }}</strong>
										</span>
									@endif
						
							</div>
							<div class="wrap-input100 validate-input m-b-10" data-validate = "Address is required">
								<input for="address_1" class="input100" id="address_1" type="text" class="form-control{{ $errors->has('address_1') ? ' is-invalid' : '' }}" name="address_1" value="{{ old('address_1') }}" placeholder="{{ __('Address') }}" required autofocus>
									@if ($errors->has('address_1'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('address_1') }}</strong>
										</span>
									@endif
							</div>
							<div class="wrap-input100 validate-input m-b-10">
								<input for="address_2" class="input100" id="address_2" type="text" name="address_2" value="{{ old('address_2') }}" placeholder="{{ __('Address 2') }}" autofocus>
							</div>
								<div class="wrap-input100 validate-input m-b-10" data-validate = "First Name is required">
								<input for="city" class="input100" id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" placeholder="{{ __('City') }}" required autofocus>
									@if ($errors->has('city'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('city') }}</strong>
										</span>
									@endif
							</div>
							<div class="wrap-input100 validate-input m-b-10" data-validate = "State / Province is required">
								<input for="state_province" class="input100" id="state_province" type="text" class="form-control{{ $errors->has('state_province') ? ' is-invalid' : '' }}" name="state_province" value="{{ old('state_province') }}" placeholder="{{ __('State / Province') }}" required autofocus>
									@if ($errors->has('state_province'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('state_province') }}</strong>
										</span>
									@endif
							</div>
							<div class="wrap-input100 validate-input m-b-10" data-validate = "Country is required">
								<select for="country" class="input100" id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}" placeholder="{{ __('Country') }}" required autofocus>
									<optgroup label="State:">
										<option value="s1">Canada</option>
										<option value="s2">USA</option>
										<option value="s3">United Kingdom</option>
										<option value="s4">Mexico</option>
									</optgroup>
								</select>
										@if ($errors->has('country'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('country') }}</strong>
									</span>
								@endif
							</div>
						</div>
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

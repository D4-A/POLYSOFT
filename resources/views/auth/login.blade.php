<!DOCTYPE html>
<html lang="en">
<head>
	<title>LOG-IN</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="{{asset('plogin/images/icons/favicon.ico')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('plogin/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('plogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('plogin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('plogin/vendor/animate/animate.css')}}">	
	<link rel="stylesheet" type="text/css" href="{{asset('plogin/vendor/css-hamburgers/hamburgers.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('plogin/vendor/animsition/css/animsition.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('plogin/vendor/select2/select2.min.css')}}">	
	<link rel="stylesheet" type="text/css" href="{{asset('plogin/vendor/daterangepicker/daterangepicker.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('plogin/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('plogin/css/main.css')}}">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title backlogo">
					<span class="login100-form-title-1">
						Sign In
					</span>
				</div>
                <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                    @csrf
                    <div class="wrap-input100 validate-input m-b-26">
                        <span class="label-input100">{{ __('E-mail') }}</span>

                        <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" placeholder="Enter e-mail_address" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <span class="focus-input100"></span>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="wrap-input100 validate-input m-b-18">
                        <span class="label-input100">{{ __('Password') }}</span>
                        <input id="password" class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Enter password" required autocomplete="current-password">
                        <span class="focus-input100"></span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="flex-sb-m w-full p-b-30">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="remember" type="checkbox" name="remember-me" {{ old('remember') ? 'checked' : '' }}>
                            <label class="label-checkbox100" for="remember">{{ __('Remember Me') }}</label>
                        </div>

                        <div>
                            @if (Route::has('password.request'))
                                <a class="txt1" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            {{ __('Login') }}
                        </button>
                    </div>
                </form> 
            </div>
        </div>
    </div>
	<script src="{{asset('plogin/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('plogin/vendor/animsition/js/animsition.min.js')}}"></script>
	<script src="{{asset('plogin/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('plogin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('plogin/vendor/select2/select2.min.js')}}"></script>
	<script src="{{asset('plogin/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('plogin/vendor/daterangepicker/daterangepicker.js')}}"></script>
	<script src="{{asset('plogin/vendor/countdowntime/countdowntime.js')}}"></script>
	<script src="{{asset('plogin/js/main.js')}}"></script>

</body>
</html>
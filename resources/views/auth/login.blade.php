{{-- @extends('layouts.app') --}}

<!DOCTYPE html>
<html lang="es">
<head>
	<title>AmzBooks</title>
	<meta charset="utf8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
	<style>
	@import url(https://fonts.googleapis.com/css?family=Roboto:300);



    .logo{
        height: 572px;
    }

    .amzlogo{
        text-align:center;
        justify-content: center;
        top: -100px;
        position: relative;
        height: 520px;
        overflow: hidden;
        transform: scale(0.4);
    }

    .amzlogo:after{
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 200%;
        height: 100%;
        background: linear-gradient(to right, transparent, #000, #000);
        animation: animate 4s linear forwards;
    }

    @keyframes animate{
        0%{
            right: 0;
        }
        100%{
            right: -200%;
        }
    }



    .heading{
    color: #fff;
    text-transform: uppercase;
    position: relative;
    top: -180px;
    margin: 0;
    padding: 0;
    text-align: center;
    font-family: arial;
    font-size: 45px;
    letter-spacing: 10px;
    }

    .login-page {
    width: 360px;
    padding: 1% 0 0;
    margin: auto;
    }
    .form {
        top:-180px;
        right: 1.5%;
    position: relative;
    z-index: 1;
    background: #8d0c14;
    max-width: 360px;
    margin: 0 auto 100px;
    padding: 40px;
    text-align: center;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }
    .form input {
    font-family: "Roboto", sans-serif;
    outline: 0;
    background: #f2f2f2;
    width: 100%;
    border: 0;
    margin: 0 0 15px;
    padding: 15px;
    box-sizing: border-box;
    font-size: 14px;
    }
    .form button {
    font-family: "Roboto", sans-serif;
    text-transform: uppercase;
    outline: 0;
    background: #000;
    width: 100%;
    border: 0;
    padding: 15px;
    color: #FFFFFF;
    font-size: 14px;
    -webkit-transition: all 0.3 ease;
    transition: all 0.3 ease;
    cursor: pointer;
    }
    .form button:hover,.form button:active,.form button:focus {
    background: #e50914;
    }
    .form .message {
    margin: 15px 0 0;
    color: #FFF;
    font-size: 12px;
    }
    .form .message a {
    color: #000;
    }
    .form .register-form {
    display: none;
    }
    .container {
    position: relative;
    z-index: 1;
    max-width: 300px;
    margin: 0 auto;
    }
    .container:before, .container:after {
    content: "";
    display: block;
    clear: both;
    }
    .container .info {
    margin: 50px auto;
    text-align: center;
    }
    .container .info h1 {
    margin: 0 0 15px;
    padding: 0;
    font-size: 36px;
    font-weight: 300;
    color: #1a1a1a;
    }
    .container .info span {
    color: #4d4d4d;
    font-size: 12px;
    }
    .container .info span a {
    color: #000000;
    text-decoration: none;
    }
    .container .info span .fa {
    color: #EF3B3A;
    }
    body {
    background: #000000;
    font-family: "Roboto", sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    }

    .img{
    width: 1246px;
    }

    .invalid-feedback {
        display: inline;
        width: 100%;
        margin-top: 0.25rem;
        font-size: 80%;
        color: #000000;
    }

	</style>
</head>
<body>
    <div class="logo">
        <div class="amzlogo">
            <img src="{{ asset('img/amzlogo.png') }}" alt="">
        </div>
        <h3 class="heading">AMZBOOKS</h3>
    </div>

	<div class="login-page">

		<div class="form">

			<!-- formulario de login -->
			<form method="post" class="login-form" action="{{ route('login') }}">
                @csrf
				<!-- email -->
                        <input id="email" type="email" class="@error('email') is-invalid @enderror"
						name="email" placeholder="email" required autocomplete="email" autofocus/>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				<!-- contraseña -->
						<input  type="password" class="@error('password') is-invalid @enderror"
						name="password" placeholder="password" required />
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
					<button type="submit">login</button>
					<p class="message">Dont have an account? <a href="/register">Create one</a></p>
			</form>
		</div>

<!-- acceso REGSISTRO -->

	</div> <!-- container -->

</body>
</html>


{{--
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

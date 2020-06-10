
<!DOCTYPE html>
<html lang="es">
<head>
	<title>AmzBooks</title>
    <meta charset="utf8" />
    <link rel="icon" type="image/ico" href="{{asset("img/favicon.ico")}}"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{asset("css/main.css")}}">
    <style>
	@import url(https://fonts.googleapis.com/css?family=Roboto:300);
	</style>
</head>
<body class="body-login">
    <div class="logo-login">
        <div class="amzlogo-login">
            <img src="{{ asset('img/amzlogo.png') }}" alt="">
        </div>
        <h3 class="heading-login">AMZBOOKS</h3>
    </div>

	<div class="login-page">

		<div class="form-login">

			<!-- formulario de login -->
			<form method="post" class="login-form" action="{{ route('register') }}">
                @csrf
                <input id="name" type="text"
                        name="name"  @error('name') is-invalid @enderror placeholder="Name" required autocomplete="name" autofocus/>
                        @error('name')
                            <span class="invalid-feedback-login" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				<!-- email -->
						<input id="email" type="email"
						name="email" placeholder="email" required autocomplete="email" autofocus/>
                        @error('email')
                            <span class="invalid-feedback-login" role="alert">
                               <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				<!-- contraseña -->
                        <input  type="password" name="password" placeholder="password" required />
                        <input  type="password" name="password-confirm" placeholder="password confirm" required />
                        @error('password')
                        <span class="invalid-feedback-login" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
					<button type="submit">Registrar</button>
					<p class="message">Already Registered?<a href="/login">Log in</a></p>
			</form>
		</div>

<!-- acceso REGSISTRO -->

	</div> <!-- container -->

</body>
</html>



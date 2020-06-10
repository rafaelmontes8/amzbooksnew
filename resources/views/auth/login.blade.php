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
			<form method="post" class="login-form" action="{{ route('login') }}">
                @csrf
				<!-- email -->
                        <input id="email" type="email" class="@error('email') is-invalid @enderror"
						name="email" placeholder="email" required autocomplete="email" autofocus/>
                        @error('email')
                            <span class="invalid-feedback-login" role="alert">
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
                    <!-- acceso REGSISTRO -->
					<p class="message">Dont have an account? <a href="/register">Create one</a></p>
			</form>
		</div>



	</div>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>

</body>
</html>

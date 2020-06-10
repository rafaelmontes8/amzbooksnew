{{-- @extends('layouts.app')

@section('content')



 --}}



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AmzBooks</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">

    <style>
		body{
			background-color:#181A1B;
        }

        .logo{
            height: 245px;
        }

        .amzlogo{
            margin-top: 7vh;
                text-align:center;
                justify-content: center;
                position: relative;
                overflow: hidden;
            }
        .heading{
            color: #fff;
            text-transform: uppercase;
            position: relative;
            top: 0px;
            padding: 0;
            text-align: center;
            font-family: arial;
            font-size: 45px;
            letter-spacing: 10px;
            }
            .ichart{
                margin-top: 15vh;
                padding-left: 0;
                padding-right: 0;
                margin-left: auto;
                margin-right: auto;
                display: block;
                width: 80vw;
            }
        @media screen and (min-width: 1000px) {
            .ichart{
                width: 40vw;
            }
        }

    </style>

</head>
<body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light navbar-dark bg-dark">

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="navbar-toggler-icon"></span>
				</button> <a class="navbar-brand" href="/home">AmzBooks</a>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="navbar-nav">
						<li class="nav-item">
							 <a class="nav-link" href="/lista">Bookshelf</a>
						</li>
					</ul>
					<ul class="navbar-nav ml-md-auto">
						<li class="nav-item dropdown">
							 <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown">Opciones</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a @if(Auth::user()->role != 'admin') {{'style="display:none"'}}  @endif class="dropdown-item" href="/users">User Panel</a>
                                    <a @if(Auth::user()->role != 'admin') {{'style="display:none"'}}  @endif class="dropdown-item" href="/ajaxbooks">Panel Admin</a>
                                    <a @if(Auth::user()->role != 'admin') {{'style="display:none"'}}  @endif class="dropdown-item" href="/searchbook">Añadir Libros</a>
                                    <a class="dropdown-item" href="/profile">Profile</a>
								<div class="dropdown-divider">
								</div> <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
							</div>
						</li>
					</ul>
				</div>
            </nav>
            <div class="container-fluid">
                <div class="logo">
                    <div class="amzlogo">
                        <img class="img-fluid" src="{{ asset('img/amzbooks.svg') }}" alt="">
                    </div>
                    <h3 class="heading">Profile</h3>
                </div>
            </div>
            <div class="row ichart">
                <canvas id="myChart" ></canvas>
            </div>

		</div>
	</div>
</div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>

    <script>
        var ctx= document.getElementById("myChart").getContext("2d");
        var myChart= new Chart(ctx,{
            type:"pie",
            data:{
                labels:['Libros Leidos','Libros Totales','Libros Puntuados'],
                datasets:[{
                        label:'Num datos',
                        data:[{{$contador}},{{$books}},{{$contador2}}],
                        backgroundColor:[
                            'rgb(66, 134, 244,0.5)',
                            'rgb(74, 135, 72,0.5)',
                            'rgb(229, 89, 50,0.5)'
                        ]
                }]
            },
            options:{
                scales:{
                    yAxes:[{
                            ticks:{
                                beginAtZero:true
                            }
                    }]
                }
            }
        });
    </script>

</body>
</html>

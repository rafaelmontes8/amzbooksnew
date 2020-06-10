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

        .container { margin: 150px auto; }
        @media (min-width: 768px) {

        .carousel-inner .carousel-item-right.active,
        .carousel-inner .carousel-item-next {
            transform: translateX(50%);
        }

        .carousel-inner .carousel-item-left.active,
        .carousel-inner .carousel-item-prev {
            transform: translateX(-50%);
        }
        }

        /* large - display 3 */
        @media (min-width: 992px) {

        .carousel-inner .carousel-item-right.active,
        .carousel-inner .carousel-item-next {
            transform: translateX(33%);
        }

        .carousel-inner .carousel-item-left.active,
        .carousel-inner .carousel-item-prev {
            transform: translateX(-33%);
        }
        }

        @media (max-width: 768px) {
        .carousel-inner .carousel-item>div {
            display: none;
        }

        .carousel-inner .carousel-item>div:first-child {
            display: block;
        }
        }

        .carousel-inner .carousel-item.active,
        .carousel-inner .carousel-item-next,
        .carousel-inner .carousel-item-prev {
        display: flex;
        }

        .carousel-inner .carousel-item-right,
        .carousel-inner .carousel-item-left {
        transform: translateX(0);
        }

        .logo{
            height: 245px;
        }

        .amzlogo{
            text-align:center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            transform: scale(1);
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
                        <img class="amz" src="{{ asset('img/amzbooks.svg') }}" alt="">
                    </div>
                </div>
                <div class="row" style="justify-content:center;margin-top: 15vh" >
                    <form class="form-inline" action="{{route('newbooks')}}" method="post">
                        @csrf
                        <input class="form-control mr-sm-2" type="search" name="busqueda"  placeholder="Insert title and press enter" id="busqueda" style="width: 40vw">
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">
							Search
						</button>
                    </form>
                </div>

                <div class="container ">
                    <div class="row mx-auto my-auto">
                        <div id="myCarousel" class="carousel slide w-100" data-ride="carousel">
                            <div class="carousel-inner w-100" role="listbox">
                                <div class="carousel-item active">
                                    <div class="col-lg-4 col-md-6">
                                    <img class="img-fluid" src="{{asset('img/amzlogo.png')}}">
                                    </div>
                                </div>
                                @foreach ($books as $book)
                                @if($book->image=="img/no-image.png" || $book->image=="")
                                @else
                                    <div class="carousel-item">
                                        <div class="col-lg-4 col-md-6">
                                            <img class="img-fluid" src="{{$book->image}}">
                                        </div>
                                    </div>
                                @endif
                                @endforeach
                            </div>
                            <a class="carousel-control-prev bg-dark w-auto" href="#myCarousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next bg-dark w-auto" href="#myCarousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

		</div>
	</div>
</div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
    <script src="{{asset('js/carousel.js')}}"></script>

</body>
</html>

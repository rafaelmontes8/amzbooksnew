{{-- @extends('layouts.app')

@section('content')



 --}}



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/ico" href="{{asset("img/favicon.ico")}}"/>
    <title>AmzBooks</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset("css/main.css")}}">
</head>
<body class="body-home">

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
							 <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown">Options</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a @if(Auth::user()->role != 'admin') style="display:none"  @endif class="dropdown-item" href="/users">User Panel</a>
                                    <a @if(Auth::user()->role != 'admin') style="display:none"  @endif class="dropdown-item" href="/ajaxbooks">Panel Admin</a>
                                <a @if(Auth::user()->role != 'admin') style="display:none"  @endif class="dropdown-item" href="/searchbook">Add Books</a>
                                <a class="dropdown-item" href="/profile">Profile</a>
								<div class="dropdown-divider">
								</div> <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

            <h1 class="welcome">Bookshelf Of {{ Auth::user()->name }}</h1>
                <div class="row div-home">
                    @foreach ($finalbooks as $libro)

                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">

                        <div class="card div2-home">
                        <a href="/show/{{$libro->id}}">
                        <img class="card-img-top img-book-home" alt="Book Cover" src="@if($libro->image=="img/no-image.png" || $libro->image==""){{asset("img/no-image.png")}}@else{{$libro->image}}@endif" />
                        </a>
                            <div class="card-block">
                                <h5 class="card-title booktitle-home">
                                    {{$libro->title}}
                                </h5>
                                <div class="card-body d-flex flex-column align-items-end" style="padding-right: 0">
                                    <a class="btn btn-success" style="bottom: 0px;right: 0px;" href="/removefromlist/{{$libro->id}}">Added</a>
                                </div>
                            </div>

                        </div>

                    </div>
                    @endforeach
                </div>
                </div>
            </div>
        </div>
    </body>
</html>

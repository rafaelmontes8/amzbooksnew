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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
    <style>
		body{
			background-color:#181A1B;
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
                    <form class="form-inline" method="get" action="/search">
                        <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search..."/>
						<button class="btn btn-primary my-2 my-sm-0" type="submit">
							Search
						</button>
					</form>
					<ul class="navbar-nav ml-md-auto">
						<li class="nav-item dropdown">
							 <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown">Options</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a @if(Auth::user()->role != 'admin') {{'style="display:none"'}}  @endif class="dropdown-item" href="/users">User Panel</a>
                                    <a @if(Auth::user()->role != 'admin') style="display:none"  @endif class="dropdown-item" href="/ajaxbooks">Admin Panel</a>
                                <a @if(Auth::user()->role != 'admin') style="display:none"  @endif class="dropdown-item" href="/searchbook">Add Books</a>
								<div class="dropdown-divider">
								</div> <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
							</div>
						</li>
					</ul>
				</div>
            </nav>
        <h1 style="text-align: center;margin-top:20vh;color:white">Welcome, {{ Auth::user()->name }}</h1>
            <div style="margin-top:1%;" class="row">
                @foreach ($books as $libro)

				<div class="col-md-2">

                    <div style="height:600px;margin-bottom:5%; background-color:#181A1B;color:white;" class="card">
                    <a href="/show/{{$libro->id}}">
                    <img style="height:450px" class="card-img-top" alt="Bootstrap Thumbnail Third" src="@if($libro->image=="img/no-image.png" || $libro->image==""){{asset("img/no-image.png")}}@else{{$libro->image}}@endif" />
                    </a>
						<div class="card-block">
							<h5 class="card-title" style="height:70px;max-height: 70px;">
                                {{$libro->title}}
							</h5>
                                @php
                                        $comprobacion = false;
                                @endphp
                                @foreach ($userbooks as $userbook)
                                    @if($libro->id == $userbook->bookId && Auth::user()->id == $userbook->userId)
                                        @php
                                        $comprobacion = true;
                                        @endphp
                                    @endif
                                @endforeach

                                @if($comprobacion)
                                    <div class="card-body d-flex flex-column align-items-end">
                                    <a class="btn btn-success" style="bottom: 0px;right: 0px;" href="/removefromlist/{{$libro->id}}">Añadido</a>
                                    </div>
                                @else
                                    <div class="card-body d-flex flex-column align-items-end">
                                    <a class="btn btn-primary" style=";bottom: 0px;right: 0px;" href="/addtolist/{{$libro->id}}">Añadir</a>
                                    </div>
                                @endif
						</div>

					</div>

				</div>
				@endforeach
            </div>
            <div class="pagination" style="justify-content:center">
                {{$books->links()}}
            </div>
		</div>
	</div>
</div>
</body>
</html>

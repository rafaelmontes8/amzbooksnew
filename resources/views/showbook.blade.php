<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/ico" href="{{asset("img/favicon.ico")}}"/>
    <title>AmzBooks</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/jquery.rateyo.css')}}">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
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
							 <a class="nav-link" href="/lista">BookShelf</a>
						</li>
					</ul>
					<ul class="navbar-nav ml-md-auto">
						<li class="nav-item dropdown">
							 <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown">Opciones</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a @if(Auth::user()->role != 'admin') style="display:none"  @endif class="dropdown-item" href="/users">User Panel</a>
                                    <a @if(Auth::user()->role != 'admin') style="display:none"  @endif class="dropdown-item" href="/ajaxbooks">Panel Admin</a>
                                    <a @if(Auth::user()->role != 'admin') style="display:none"  @endif class="dropdown-item" href="/searchbook">Añadir Libros</a>
                                    <a class="dropdown-item" href="/profile">Profile</a>
								<div class="dropdown-divider">
								</div> <a class="dropdown-item" href="/logout">Logout</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
            <div style="margin-top:10vh;">

                <img class="img-fluid mx-auto d-block img-book-home" alt="book cover" src="@if($libro->image=="img/no-image.png" || $libro->image==""){{asset("img/no-image.png")}}@else{{$libro->image}}@endif" />
                            <div class="mx-auto d-block bookdiv-show">
                                <h3 class="booktitle-show">
                                    {{$libro->title}}
                                </h3>
                                    @php
                                            $comprobacion = false;
                                            $rating=false;
                                    @endphp
                                    @foreach ($userbooks as $userbook)
                                        @if($libro->id == $userbook->bookId && Auth::user()->id == $userbook->userId)
                                            @php
                                            $comprobacion = true;
                                            @endphp
                                        @endif
                                    @endforeach

                                    @if($comprobacion)
                                        <div style="margin: 5vh">
                                        <a class="btn btn-success" style="bottom: 0px;right: 0px;" href="/removefromlist/{{$libro->id}}">Added</a>
                                    </div>
                                    <div @if(Auth::user()->role != 'admin') style="display:none"  @endif>
                                        <a class="btn btn-danger" style=";bottom: 0px;right: 0px;" href="/addtolist/{{$libro->id}}">Delete Book</a>
                                    </div>
                                    @else
                                        <div style="margin: 5vh">
                                        <a class="btn btn-primary" style=";bottom: 0px;right: 0px;" href="/addtolist/{{$libro->id}}">Add</a>
                                    </div>
                                    <div @if(Auth::user()->role != 'admin') style="display:none"  @endif>
                                        <form action="/deletebook" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$libro->id}}">
                                            <input class="btn btn-danger" type="submit" value="Delete Book">
                                        </form>
                                    </div>
                                    @endif
                            </div>

                            <div class="ratingstar" id="rateYo"></div>
                            <form id="ratingform" action="/rating" method="post">
                                @csrf
                                <input type="hidden" name="idbook" value="{{$libro->id}}">
                                <input type="hidden" name="rating" id="rating">
                            </form>
                            <h4 class="show-caracteristica">Author: {{$libro->author}}</h4>
                            <h4 class="show-caracteristica">Publisher: {{$libro->publisher}}</h4>
                            <h4 class="show-caracteristica">Description:</h4>
                        <p style="color:white;margin:5%">
                            @if($libro->description == "" || $libro->description=="null" || $libro->description == null)
                            This book doesnt have a description.
                            @else
                            {{$libro->description}}
                            @endif </p>
                            <div class="form-group" style="margin:5%">
                                <form action="/postcomment" method="post">
                                    @csrf
                                    <label class="booktitle-show" for="comment">Comment</label>
                                    <textarea class="form-control" type="text" name="comment" id="comment" rows="4" placeholder="Write a comment"></textarea>
                                <input style="display: none" type="text" name="bookid" value="{{$libro->id}}">
                                    <button type="submit" class="btn btn-primary comment-btn">Send</button>
                                </form>
                            </div>
            </div>
            @foreach ($comments as $comment)
                <div class="comment-box">
                    <h4>{{$comment->username}} @if(Auth::user()->role == 'admin' || Auth::user()->id==$comment->userid)<a href="/deletecomment/{{$comment->id}}"><i class="fas fa-trash"></i></a>@endif</h4><p>{{$comment->created_at}}</p>
                <p>{{$comment->comment}}</p>
                </div>
            @endforeach
            <div class="pagination custom-link">
                {{$comments->links()}}
            </div>
		</div>
	</div>
</div>
<script src="{{asset('js/jquery.rateyo.js')}}"></script>
<script>
    $(function () {
        $("#rateYo").rateYo({
            @foreach ($userbooks as $userbook)
                @if($libro->id == $userbook->bookId && Auth::user()->id == $userbook->userId && $userbook->rating != 0)
                    rating: {{$userbook->rating}},
                    @php
                        $rating=true;
                    @endphp
                @else
                @endif
            @endforeach
            @if(!$rating)
                rating: 0,
            @endif
            onSet: function (rating, rateYoInstance) {
                    document.getElementById("rating").value = rating;
                    document.getElementById("ratingform").submit();
                }
        });
    });
</script>
</body>
</html>

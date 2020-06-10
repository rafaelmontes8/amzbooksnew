<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AMZBOOKS</title>
        <link rel="icon" type="image/ico" href="{{asset("img/favicon.ico")}}"/>
        <meta name="description" content="Personal proyects blog of a young web developer">
        <meta name="keywords" content="rafael montes, developer, young programming">
        <meta property="og:title" content="AmzBooks">
        <meta property="og:description" content="Simple Bookshelf administrator">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.0/anime.js" integrity="sha256-nnFnuz7rC1JLnvsb8M7A9aXcRHTpUN4vYA26t2UO+dQ=" crossorigin="anonymous"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>


        <style>
            html {
            box-sizing: border-box;
            }

            *,
            *:before,
            *:after {
            box-sizing: inherit;
            }

            body {
            margin: 0;
            min-height: 100vh;
            font-size: 1rem;
            line-height: 1.25;
            background-color: #000000;
            }

            .logo{
                height: 245px;
            }

            .amzlogo{
                text-align:center;
                justify-content: center;
                top: 100px;
                position: relative;
                height: 520px;
                overflow: hidden;
                transform: scale(1);
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

            @import url(https://fonts.googleapis.com/css?family=Roboto:300);

            form {
                top:-80%;
                position: relative;
                z-index: 1;
                max-width: 380px;
                margin: 0 auto 100px;
                text-align: center;
            }

            form button {
                margin-top: 90%;
                font-family: "Roboto", sans-serif;
                text-transform: uppercase;
                outline: 0;
                background: #e50914;
                width: 100%;
                border: 0;
                padding: 15px;
                color: #FFFFFF;
                font-size: 14px;
                -webkit-transition: all 0.3 ease;
                transition: all 0.3 ease;
                cursor: pointer;
            }

            form button:hover,.form button:active,.form button:focus {
                background: #e50914;
            }

            .message{
            top: 0;

            }

        </style>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        <div class="logo">
            <div class="amzlogo">
                <img class="amz" src="{{ asset('img/amzbooks.svg') }}" alt="">
            </div>
            <h3 class="heading">AMZBOOKS</h3>
        </div>
        <form action="/login">
            <button type="submit">Launch</button>
        </form>

        <h3 class="heading message">YOUR EMAIL HAS BEEN VERIFICATED SUCCESFULLY</h3>
          <script src="{{asset("js/main.js")}}"></script>
    </body>
</html>

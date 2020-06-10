<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AMZBOOKS</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
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
/*
            .grid {
            width: 100%;
            max-width: 60rem;
            margin-left: auto;
            margin-right: auto;

            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            flex-direction: row;
            flex-wrap: wrap;
            }

            .grid-block {
            width: 50%;
            min-height: 11.25rem;
            padding: 1rem;
            }

            .image-grid {
            -webkit-transform: rotateX(45deg) rotateZ(45deg);
            transform: rotateX(45deg) rotateZ(45deg);
            -webkit-perspective: 1000px;
            perspective: 1000px;
            }

            .image-grid .tile-link:hover .tile-img {
            top: -1rem;
            left: -1rem;
            }

            .image-grid .tile-img {
            position: relative;
            top: 0;
            left: 0;
            -webkit-transition-property: opacity, top, left, box-shadow;
            transition-property: opacity, top, left, box-shadow;
            }

            .tile-link {
            display: block;
            }

            .tile-link:hover .tile-img {
            opacity: 1;
            }

            .tile-link:hover .tile-img-link {
            display: block;
            }

            .tile-link:hover .tile-img-link:hover .tile-img {
            opacity: 0.5;
            }

            .tile-img {
            display: block;
            width: 100%;
            height: auto;
            opacity: 1;
            -webkit-transition-property: opacity;
            transition-property: opacity;
            -webkit-transition-duration: 0.125s;
            transition-duration: 0.125s;
            -webkit-transition-timing-function: ease-in;
            transition-timing-function: ease-in;
            }
            .tile-link:hover .tile-img1 {
            box-shadow: 5px 5px rgba(244, 170, 200, 0.4),
                10px 10px rgba(244, 170, 200, 0.3), 15px 15px rgba(244, 170, 200, 0.2),
                20px 20px rgba(244, 170, 200, 0.1), 25px 25px rgba(244, 170, 200, 0.05);
            }

            .tile-link:hover .tile-img2 {
            box-shadow: 5px 5px rgba(45, 186, 233, 0.4), 10px 10px rgba(45, 186, 233, 0.3),
                15px 15px rgba(45, 186, 233, 0.2), 20px 20px rgba(45, 186, 233, 0.1),
                25px 25px rgba(45, 186, 233, 0.05);
            }

            .tile-link:hover .tile-img3 {
            box-shadow: 5px 5px rgba(214, 221, 244, 0.4),
                10px 10px rgba(214, 221, 244, 0.3), 15px 15px rgba(214, 221, 244, 0.2),
                20px 20px rgba(214, 221, 244, 0.1), 25px 25px rgba(214, 221, 244, 0.05);
            }

            .tile-link:hover .tile-img4 {
            box-shadow: 5px 5px rgba(82, 119, 192, 0.4), 10px 10px rgba(82, 119, 192, 0.3),
                15px 15px rgba(82, 119, 192, 0.2), 20px 20px rgba(82, 119, 192, 0.1),
                25px 25px rgba(82, 119, 192, 0.05);
            }

            .tile-link:hover .tile-img5 {
            box-shadow: 5px 5px rgba(138, 218, 245, 0.4),
                10px 10px rgba(138, 218, 245, 0.3), 15px 15px rgba(138, 218, 245, 0.2),
                20px 20px rgba(138, 218, 245, 0.1), 25px 25px rgba(138, 218, 245, 0.05);
            }

            .tile-link:hover .tile-img6 {
            box-shadow: 5px 5px rgba(203, 215, 193, 0.4),
                10px 10px rgba(203, 215, 193, 0.3), 15px 15px rgba(203, 215, 193, 0.2),
                20px 20px rgba(203, 215, 193, 0.1), 25px 25px rgba(203, 215, 193, 0.05);
            }

            .tile-link:hover .tile-img7 {
            box-shadow: 5px 5px rgba(91, 209, 250, 0.4), 10px 10px rgba(91, 209, 250, 0.3),
                15px 15px rgba(91, 209, 250, 0.2), 20px 20px rgba(91, 209, 250, 0.1),
                25px 25px rgba(91, 209, 250, 0.05);
            }

            .tile-link:hover .tile-img8 {
            box-shadow: 5px 5px rgba(145, 156, 196, 0.4),
                10px 10px rgba(145, 156, 196, 0.3), 15px 15px rgba(145, 156, 196, 0.2),
                20px 20px rgba(145, 156, 196, 0.1), 25px 25px rgba(145, 156, 196, 0.05);
            }

            .tile-link:hover .tile-img9 {
            box-shadow: 5px 5px rgba(188, 97, 129, 0.4), 10px 10px rgba(188, 97, 129, 0.3),
                15px 15px rgba(188, 97, 129, 0.2), 20px 20px rgba(188, 97, 129, 0.1),
                25px 25px rgba(188, 97, 129, 0.05);
            }

            .tile-link:hover .tile-img10 {
            box-shadow: 5px 5px rgba(4, 140, 231, 0.4), 10px 10px rgba(4, 140, 231, 0.3),
                15px 15px rgba(4, 140, 231, 0.2), 20px 20px rgba(4, 140, 231, 0.1),
                25px 25px rgba(4, 140, 231, 0.05);
            } */

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

            @media screen and (max-width: 480px) {
                .grid .image-grid{
                    display: none;
                }
            }

            /* .flex-container {
                display: flex;
                flex-wrap: nowrap;
                justify-content: center;
            }

            .flex-container > div {
                text-align: center;
                line-height: 75px;
                font-size: 30px;
            } */

            .col-md-6{
                padding:1vw;
            }

        </style>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        <div class="logo">
            <div class="amzlogo">
                <img class="img-fluid" src="{{ asset('img/amzbooks.svg') }}" alt="">
            </div>
            <h3 class="heading">AMZBOOKS</h3>
        </div>
        <form action="/login">
            <button type="submit">Launch</button>
        </form>

        <h3 class="heading message">What do you want to read today?</h3>

    <div class="container-fluid" >
        <div class="row" >
            <div class="col-lg-4 col-md-6">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/s8zBR1l4Tgc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/S6WuzK8qGpo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/mS60CMh1zPs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/iqPi9jZu7V0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zy40wRmGq9c" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/A3M0GgI0xQk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>


    {{-- <div class="grid image-grid">
            <div class="grid-block">
              <div class="tile">
                <a class="tile-link" href="#">
                  <img class="tile-img tile-img1" src="https://i.ibb.co/px3W7JM/poster-for-deathly-hallows-part-two-movie-wallpaper-harry-potter-battle-of-hogwarts-450x280.jpg" alt="Image">
                </a>
              </div>
            </div>

            <div class="grid-block">
              <div class="tile">
                <a class="tile-link" href="#">
                  <img class="tile-img tile-img2" src="https://i.ibb.co/px3W7JM/poster-for-deathly-hallows-part-two-movie-wallpaper-harry-potter-battle-of-hogwarts-450x280.jpg" alt="Image">
                </a>
              </div>
            </div>

            <div class="grid-block">
              <div class="tile">
                <a class="tile-link" href="#">
                  <img class="tile-img tile-img3" src="https://i.ibb.co/px3W7JM/poster-for-deathly-hallows-part-two-movie-wallpaper-harry-potter-battle-of-hogwarts-450x280.jpg" alt="Image">
                </a>
              </div>
            </div>

            <div class="grid-block">
              <div class="tile">
                <a class="tile-link" href="#">
                  <img class="tile-img tile-img4" src="https://i.ibb.co/px3W7JM/poster-for-deathly-hallows-part-two-movie-wallpaper-harry-potter-battle-of-hogwarts-450x280.jpg" alt="Image">
                </a>
              </div>
            </div>

            <div class="grid-block">
              <div class="tile">
                <a class="tile-link" href="#">
                  <img class="tile-img tile-img5" src="https://i.ibb.co/px3W7JM/poster-for-deathly-hallows-part-two-movie-wallpaper-harry-potter-battle-of-hogwarts-450x280.jpg" alt="Image">
                </a>
              </div>
            </div>

            <div class="grid-block">
              <div class="tile">
                <a class="tile-link" href="#">
                  <img class="tile-img tile-img6" src="https://i.ibb.co/px3W7JM/poster-for-deathly-hallows-part-two-movie-wallpaper-harry-potter-battle-of-hogwarts-450x280.jpg" alt="Image">
                </a>
              </div>
            </div>

            <div class="grid-block">
              <div class="tile">
                <a class="tile-link" href="#">
                  <img class="tile-img tile-img7" src="https://i.ibb.co/px3W7JM/poster-for-deathly-hallows-part-two-movie-wallpaper-harry-potter-battle-of-hogwarts-450x280.jpg" alt="Image">
                </a>
              </div>
            </div>

            <div class="grid-block">
              <div class="tile">
                <a class="tile-link" href="#">
                  <img class="tile-img tile-img8" src="https://i.ibb.co/px3W7JM/poster-for-deathly-hallows-part-two-movie-wallpaper-harry-potter-battle-of-hogwarts-450x280.jpg" alt="Image">
                </a>
              </div>
            </div>

            <div class="grid-block">
              <div class="tile">
                <a class="tile-link" href="#">
                  <img class="tile-img tile-img9" src="https://i.ibb.co/px3W7JM/poster-for-deathly-hallows-part-two-movie-wallpaper-harry-potter-battle-of-hogwarts-450x280.jpg" alt="Image">
                </a>
              </div>
            </div>

            <div class="grid-block">
              <div class="tile">
                <a class="tile-link" href="#">
                  <img class="tile-img tile-img10" src="https://i.ibb.co/px3W7JM/poster-for-deathly-hallows-part-two-movie-wallpaper-harry-potter-battle-of-hogwarts-450x280.jpg" alt="Image">
                </a>
              </div>
            </div>

          </div> --}}
          <script src="{{asset("js/main.js")}}"></script>
    </body>
</html>

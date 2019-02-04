<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ASERWEB</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #58ACFA
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/') }}">Aserweb</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="{{ url('/home') }}">Home</a></li>
            <li><a class="navbar-brand" href="{{ url('cargos') }}">Cargos</a></li>
            <li><a class="navbar-brand" href="{{ url('sedes') }}">Sedes</a></li>
            <li><a class="navbar-brand" href="{{ url('tipoausentismos') }}">Tipoausentimos</a></li>
            <li><a class="navbar-brand" href="{{ url('tipovinculacion') }}">Tipovinculacion</a></li>
            <li><a class="navbar-brand" href="{{ url('empleados') }}">Empleados</a></li>
            <li><a class="navbar-brand" href="{{ url('ausentismos') }}">Ausentismos</a></li>
          </ul>
        </div> <!--///.nav-collapse -->
      </div>
    </nav>
    <!-- <nav>
        <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="{{ url('cargos') }}">Cargos</a>
              <a class="navbar-brand" href="{{ url('sedes') }}">Sedes</a>
              <a class="navbar-brand" href="{{ url('tipoausentismos') }}">Tipoausentimos</a>
              <a class="navbar-brand" href="{{ url('tipovinculacion') }}">Tipovinculacion</a>
              <a class="navbar-brand" href="{{ url('empleados') }}">Empleados</a>
              <a class="navbar-brand" href="{{ url('ausentismos') }}">Ausentismos</a>
            </div>
        </nav> -->
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    ASerWeb
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ url('/favicon.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/froala_blocks.css') }}" rel="stylesheet"> --}}
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/clean-blog.css') }}" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    {{-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- Custom fonts for this template -->
    {{-- <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> --}}
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!-- Custom styles for this template -->
    {{-- <link href="css/clean-blog.css" rel="stylesheet"> --}}

    @yield('styles')

  </head>
  <body style="background-color: #fff !important;">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">

        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>{{--
        @auth
            <a class="navbar-brand" href="{{ route('company.index') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        @else
        @endauth --}}
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            @if (Auth::guest())
                <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Iniciar Sesión</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Registrarse</a></li>
            @else
                <li class="nav-item"><a class="nav-link" href="{{ url('/company') }}">Mi perfil</a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a class="nav-link text-black" href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Cerrar sesión
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    @yield('header')


    <!-- main Content -->
    @yield('content')


    <!-- Footer -->
    <footer class="bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://github.com/DeiverJC/JobiTic">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-white">
                Hecho con <i class="fa fa-heart heart-red"></i> JobiTic 2017
            </p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="vendor/jquery/jquery.min.js"></script> --}}
    {{-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> --}}

    <!-- Custom scripts for this template -->
    <script src="{{ asset('js/clean-blog.min.js') }}"></script>
    {{-- <script src="js/clean-blog.min.js"></script> --}}
    @yield('scripts')

  </body>

</html>

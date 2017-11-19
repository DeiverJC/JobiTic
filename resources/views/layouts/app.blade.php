<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ url('/favicon.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/froala_blocks.css') }}" rel="stylesheet">
    @yield('styles')

</head>
<body>
    <div id="app">

        <nav class="navbar navbar-expand-lg navbar-dark bg-danger sticky-top">

            <div class="container">
            @auth
                <a class="navbar-brand" href="{{ route('company.index') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            @else
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            @endauth
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                        data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        {{-- <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li> --}}

                    </ul>
                    <ul class="navbar-nav">
                        @if (Auth::guest())
                            <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Iniciar Sesión</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Registrarse</a></li>
                        @else
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
        <br>
        <div class="container">
            <div class="row">

                @yield('content')

            </div>
        </div>
    </div>
    <br>
    <footer class="fdb-block footer-small">
        <div class="container">
          <div class="row align-items-center text-center">
            <div class="col-12 col-lg-4 text-lg-left">
              &copy; 2017 {{ config('app.name', 'Laravel') }}
            </div>

            <div class="col-12 col-lg-4 mt-4 mt-lg-0">
              <h2 class="text-gray-dark">{{ config('app.name', 'Laravel') }}</h2>
            </div>

            <div class="col-12 col-lg-4 text-lg-right mt-4 mt-lg-0">
              <ul class="nav justify-content-lg-end justify-content-center">
                <li class="nav-item">
                  <a class="nav-link" href="#">Privacidad</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Terminos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Acerca de</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('scripts')


</body>
</html>

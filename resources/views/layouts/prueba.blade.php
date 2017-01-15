<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('plugins/materialize/css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav>
            <div class="nav-wrapper">
                <a href="href="{{ url('/') }}"" class="brand-logo">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <a href="#" data-activates="mobile-demo" class="button-collapse">
                    <i class="material-icons">menu</i>
                </a>
                <ul class="right hide-on-med-and-down">
                    @if (Auth::guest())
                        <li>
                            <a href="{{ url('/login') }}" >Login</a>
                        </li>
                        <li>
                            <a href="{{ url('/register') }}" >Register</a>
                        </li>
                        <li>
                            <a class="dropdown-button" href="#!" data-activates="dropdown1">
                                Elbin<i class="material-icons right">arrow_drop_down</i>
                            </a>
                        </li>
                    @else
                        <ul id="dropdown1" class="dropdown-content">
                            <li><a href="#!">Perfil</a></li>
                            <li><a href="#!">Administrar</a></li>
                            <li class="divider"></li>
                            <li><a href="#!">Logout</a></li>
                        </ul>
                    @endif
                    
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li><a href="sass.html">Sass</a></li>
                    <li><a href="badges.html">Components</a></li>
                    <li><a href="collapsible.html">Javascript</a></li>
                    <li><a href="mobile.html">Mobile</a></li>
                </ul>
            </div>
        </nav>
        <nav class="navbar navbar-fixed-top navbar-dark light-blue darken-4">

            <!-- Collapse button-->
            <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx2">
                <i class="fa fa-bars"></i>
            </button>

            <div class="container">

                <!--Collapse content-->
                <div class="collapse navbar-toggleable-xs" id="collapseEx2">
                    <!--Navbar Brand-->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <!--Links-->
                    <ul class="nav navbar-nav pull-right">
                        @if (Auth::guest())
                            <li class="nav-item">
                                <a href="{{ url('/login') }}" class="nav-link">Login</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/register') }}" class="nav-link">Register</a>
                            </li>
                        @else
                            <li class="nav-item btn-group">
                                <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <a class="dropdown-item" href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        @endif
                        
                    </ul>
                </div>
                <!--/.Collapse content-->

            </div>

            
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <!-- <script src="/js/app.js"></script> -->
    <script type="text/javascript" src="{{ asset('plugins/materialize/js/materialize.min.js') }}"></script>
    <script type="text/javascript">

        (function(){

            $(".dropdown-button").dropdown();
        
            $.material.init();
        }());
        
    </script>
</body>
</html>

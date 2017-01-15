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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/materialize/css/materialize.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('css/parsley.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
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
        <div class="navbar-fixed">
            <nav>
                <div class="nav-wrapper light-blue darken-4">
                    <a href="{{ url('/') }}" class="brand-logo">
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
                        @else
                            <li>
                                <a class="dropdown-button" href="#!" data-activates="dropdown1">
                                    {{ Auth::user()->first_name }}<i class="material-icons right">arrow_drop_down</i>
                                </a>
                            </li>
                            <ul id="dropdown1" class="dropdown-content">
                                <li>
                                    <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        @endif
                        
                    </ul>
                    <ul class="side-nav" id="mobile-demo">
                        @include('layouts.menu')
                    </ul>
                </div>
            </nav>
        </div>
        
        @yield('content')
    </div>

    <!-- Scripts -->
    <!-- <script src="/js/app.js"></script> -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('plugins/materialize/js/materialize.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/parsley.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".dropdown-button").dropdown();
            $(".button-collapse").sideNav();
        });        
    </script>

    @yield('script')
</body>
</html>

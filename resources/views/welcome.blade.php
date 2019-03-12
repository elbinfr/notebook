<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" href="{{ asset('images/notebook.ico') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Ingresar</a>
                    <a href="{{ url('/register') }}">Registrarse</a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Notebook
                </div>

                <div class="links">
                    <p>
                        Herramienta fácil de usar que te ayuda a organizar tus ideas.
                    </p>
                </div>

                <div class="footer">
                    <a href="http://www.nubedeideas.pe" target="_blank">Creado por Nubedeideas.pe</a>
                </div>
            </div>

        </div>
    </body>
</html>

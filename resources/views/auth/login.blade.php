@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 m8 offset-m2">
            <div class="card">
                <div class="card-content">
                    <div class="card-title">
                        Ingreso a notebook
                    </div>
                    {!! Form::open(['url' => '/login', 'method' => 'POST']) !!}
                        <div class="row">
                            <div class="input-field">
                                {!! Form::label('email', 'Correo electrónico') !!}
                                {!! Form::email('email') !!}
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="input-field">
                                {!! Form::label('password', 'Contraseña') !!}
                                {!! Form::password('password') !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="right">
                                <button class="btn waves-effect waves-light" type="submit">
                                    Ingresar
                                    <i class="material-icons right">input</i>
                                </button>
                                &nbsp;&nbsp;&nbsp;
                                <a href="{{ url('/password/reset') }}">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            </div>
                        </div>
                            
                    {!! Form::close() !!}   
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script type="text/javascript">
        (function(){

            function load(){
                verifyErrors();
                setFocus();
            }

            function verifyErrors(){
                console.log('verifyErrors');
                var errors = null;
                @if (count($errors) > 0)
                        errors = {!! json_encode($errors->all()) !!};
                var message = "";
                errors.forEach(function(value, index){
                    message = message + value + "<br>";
                });
                swal({
                    title: "Error!",
                    type: "error",
                    text: message,
                    html: true
                });
                @endif
            }

            function setFocus(){
                $('input[name=email]').focus();
            }

            setTimeout(load, 0);

        }());
    </script>
@endsection

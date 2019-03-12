@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12 m8 offset-m2">
                <div class="card">
                    <div class="card-content">
                        <div class="card-title">
                            Restablecer contrseña
                        </div>
                        {!! Form::open([
                            'url' => '/password/email',
                            'method' => 'POST',
                            'data-parsley-validate' => '']) !!}
                        <div class="row">
                            <div class="input-field">
                                {!! Form::label('email', 'Correo electrónico') !!}
                                {!! Form::email('email', null, [
                                        'required' => ''
                                    ]) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="right">
                                <button class="btn waves-effect waves-light" type="submit">
                                    Enviar enlace para restablecer contraseña
                                    <i class="material-icons right">input</i>
                                </button>                               &nbsp;&nbsp;&nbsp;

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
            }

            function verifyErrors(){
                var errors = null;
                var success = null;
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
                @elseif(session('status'))
                    success = {!! json_encode(session('status')) !!};
                    swal("Success!", success, "success");
                @endif
            }

            setTimeout(load, 0);

        }());
    </script>
@endsection
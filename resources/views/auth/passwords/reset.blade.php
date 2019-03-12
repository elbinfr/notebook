@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12 m8 offset-m2">
                <div class="card">
                    <div class="card-content">
                        <div class="card-title">
                            Restablecer contraseña
                        </div>
                        {!! Form::open([
                            'url' => '/password/reset',
                            'method' => 'POST',
                            'data-parsley-validate' => '']) !!}

                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="row">
                                <div class="input-field">
                                    {!! Form::label('email', 'Correo electrónico') !!}
                                    {!! Form::email('email', null, ['required' => '']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field">
                                    {!! Form::label('password', 'Contraseña') !!}
                                    {!! Form::password('password', [
                                        'id' => 'password',
                                        'required' => '']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field">
                                    {!! Form::label('password_confirmation', 'Confirme contraseña') !!}
                                    {!! Form::password('password_confirmation', [
                                        'required' => '',
                                        'data-parsley-equalto' => '#password']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="right">
                                    <button class="btn waves-effect waves-light" type="submit">
                                        Restablecer contraseña
                                        <i class="material-icons right">input</i>
                                    </button>
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

            setTimeout(load, 0);
        }())
    </script>
@endsection

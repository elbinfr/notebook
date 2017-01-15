@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 m8 offset-m2">
            <div class="card">
                <div class="card-content">
                    <div class="card-title">
                        Login
                    </div>
                    {!! Form::open(['url' => '/login', 'method' => 'POST']) !!}
                        <div class="row">
                            <div class="input-field">
                                {!! Form::label('email', 'E-Mail Address') !!}
                                {!! Form::email('email') !!}
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="input-field">
                                {!! Form::label('password', 'Password') !!}
                                {!! Form::password('password') !!}
                            </div>
                        </div>
                        <div class="row">
                            <p>
                                {!! Form::checkbox('remember', null, false, ['id' => 'remember']) !!}
                                {!! Form::label('remember', 'Remember Me') !!}
                            </p>
                        </div>
                        <div class="row">
                            <div class="right">
                                <button class="btn waves-effect waves-light" type="submit">
                                    Login
                                    <i class="material-icons right">input</i>
                                </button>
                                &nbsp;&nbsp;&nbsp;
                                <a href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
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

        }());
    </script>
@endsection

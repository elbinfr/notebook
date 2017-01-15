@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 m8 offset-m2">
            <div class="card">
                <div class="card-content">
                    <div class="card-title">
                        Register
                    </div>
                    {!! Form::open(['url' => '/register', 
                        'method' => 'POST',
                        'data-parsley-validate' => '',
                        'class' => 'form']) !!}
                        <div class="row">
                            <div class="input-field">
                                {!! Form::label('first_name', 'First Name') !!}
                                {!! Form::text('first_name', null, [
                                    'required' => '',
                                    'minlength' => '3',
                                    'maxlength' => '50']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field">
                                {!! Form::label('last_name', 'Last Name') !!}
                                {!! Form::text('last_name', null, [
                                    'required' => '',
                                    'minlength' => '3',
                                    'maxlength' => '50']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field">
                                {!! Form::label('email', 'E-Mail Address') !!}
                                {!! Form::email('email', null, [
                                    'required' => '',
                                    'maxlength' => '50']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field">
                                {!! Form::label('password', 'Password') !!}
                                {!! Form::password('password', [
                                    'id' => 'password', 
                                    'required' => '',
                                    'minlength' => '6']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field">
                                {!! Form::label('password_confirmation', 'Confirm Password') !!}
                                {!! Form::password('password_confirmation', [
                                    'required' => '',
                                    'data-parsley-equalto' => '#password']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="right">
                                <button class="btn waves-effect waves-light" type="submit">
                                    Register
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

        }());
    </script>
@endsection

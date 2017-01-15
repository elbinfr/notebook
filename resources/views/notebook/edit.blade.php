@extends('layouts.app')

@section('content')
    <div class="padding-5 gris">
        <h5 class="center-align">My Notebooks</h5>
    </div>
    <div class="container">
        <div class="row">
            <div class="col s12 m8 offset-m2">
                <div class="card">
                    <div class="card-content">
                        <div class="card-title">
                            Edit Notebook
                        </div>
                        @include('notebook.form', [ 'notebook' => $notebook,
                                                    'url' => '/notebooks/'.$notebook->id,
                                                    'method' => 'PATCH'])
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
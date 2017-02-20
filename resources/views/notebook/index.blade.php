@extends('layouts.app')

@section('content')
    <div class="padding-5 gris">
        @include('notebook.subheader')
    </div>
    <div class="container">
        <div class="row">
            @foreach($notebooks as $notebook)
                <div class="col s12 m6 l4">
                    <div class="card">
                        <div class="card-image">
                            @if(is_null($notebook->image) || $notebook->image == '')
                                <img src="{{ url("image/notebooks/default.jpg") }}" class="responsive-img" >
                            @else
                                <img src="{{ url("image/notebooks/$notebook->image") }}" class="responsive-img" >
                            @endif
                        </div>
                        <div class="card-content ">
                            <span class="card-title truncate activator">
                                {{ str_limit($notebook->title) }}
                                <a class="right btn-floating waves-effect waves-light red">
                                    <i class="tiny material-icons">import_export</i>
                                </a>
                            </span>
                        </div>
                        <div class="card-reveal break-word">
                            <span class="card-title ">
                                {{ $notebook->title }}
                                <i class="tiny material-icons">import_export</i>
                            </span>
                            <hr>
                            <p>
                                @php
                                    echo nl2br($notebook->description);
                                @endphp
                            </p>
                        </div>
                        <div class="card-action padding-10">
                            <a href="{{ url('/notebooks/'.$notebook->slug.'/open') }}">Open</a>
                            <a href="{{ url('/notebooks/'.$notebook->id.'/edit') }}">Edit</a>
                            @include('notebook.delete', ['notebook' => $notebook])
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="floating">
        <a href="{{ url('/notebooks/create') }}" class="btn-floating btn-large waves-effect waves-light green darken-1">
            <i class="material-icons">add</i>
        </a>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        (function(){

            function load(){
                initEvents();
            }

            function initEvents(){
                $(".form-delete").on('submit', function(event){
                    event.preventDefault();
                    var title = $(this).data('title');
                    deleteNotebook(event, title);
                });
            }

            function deleteNotebook(event, title){
                swal({
                    title: "Are you sure?",
                    text: "You want to remove the notebook: " + title + " !",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: true
                },
                function(){
                    var form = event.target;
                    form.submit();
                });
            }

            setTimeout(load, 0);
        }());
    </script>
@endsection
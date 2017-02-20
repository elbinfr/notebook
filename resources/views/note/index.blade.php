@extends('layouts.app')

@section('content')
    <div class="padding-5 gris">
        @include('note.subheader', ['title' => 'My Notes in '.session()->get('notebook')->title ])
    </div>
    <div class="container">
        <div class="row">
            @foreach($notes as $note)
                <div class="col s12 m6 l4">
                    <div class="card small {{ color_note() }} lighten-3">
                        <div class="card-content">
                            <span class="card-title">
                                {{ $note->title }}
                            </span>
                            <span class="created right-align">
                                {{ $note->created_at }}
                            </span>
                            <p>
                                @php
                                    echo nl2br($note->content);
                                @endphp
                            </p>
                        </div>
                        <div class="card-action">
                            <a href="{{ url('/notes/'.$note->slug) }}" class="brown-text">Show</a>
                            <a href="{{ url('/notes/'.$note->slug.'/edit') }}" class="brown-text">Edit</a>
                            @include('note.delete', ['note' => $note])
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="floating">
        <a href="{{ url('/notes/create') }}" class="btn-floating btn-large waves-effect waves-light green darken-1">
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
                    text: "You want to remove the note: " + title + " !",
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
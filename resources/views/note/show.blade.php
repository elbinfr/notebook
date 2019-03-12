@extends('layouts.app')

@section('content')
    <div class="padding-5 grey lighten-4">
        @include('note.subheader', ['title' => 'Mi nota: '.$note->title ])
    </div>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">
                            {{ $note->title }}
                        </span>
                        <span class="new badge blue" data-badge-caption="">
                            {{ $note->created_at }}
                        </span>
                        <p>
                            @php
                                echo nl2br($note->content);
                            @endphp
                        </p>
                    </div>
                    <div class="card-action">
                        <a href="{{ url('/notebooks/'.session()->get('notebook')->slug.'/open') }}" class="btn waves-effect waves-light light-blue darken-4">
                            Volver a lista de notas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

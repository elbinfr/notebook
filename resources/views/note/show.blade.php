@extends('layouts.app')

@section('content')
    <div class="padding-5 gris">
        <div class="padding-5 gris">
            <h6 class="center-align">
                My Note: {{ $note->title }}
            </h6>
        </div>
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
                            {{ $note->content }}
                        </p>
                    </div>
                    <div class="card-action">
                        <a href="{{ url('/notebooks/'.session()->get('notebook')->slug.'/open') }}" class="brown-text">
                            Back to list of notes
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

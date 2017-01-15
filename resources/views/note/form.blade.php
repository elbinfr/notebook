{!! Form::open(['url' => $url,
                'method' => $method,
                'files' => 'true',
                'data-parsley-validate' => ''
            ]) !!}
<div class="row">
    <div class="input-field">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', $note->title, [
            'required' => '',
            'data-parsley-required-message' => 'Title is required',
            'minlength' => '3'
        ]) !!}
    </div>
</div>
<div class="row">
    <div class="input-field">
        {!! Form::label('content', 'Content') !!}
        {!! Form::textarea('content', $note->content, [
            'class' => 'materialize-textarea',
            'required' => '',
            'data-parsley-required-message' => 'Content is required',
            'minlength' => '3'
        ]) !!}
    </div>
</div>
<div class="row">
    <div class="right">
        <button class="btn waves-effect waves-light light-blue darken-4" type="submit">
            Save
        </button>
        <a href="{{ url('/notebooks/'.session()->get('notebook')->slug.'/open') }}" class="waves-effect waves-light btn red darken-1">
            Cancel
        </a>
    </div>
</div>
{!! Form::close() !!}
{!! Form::open(['url' => $url,
                'method' => $method,
                'files' => 'true',
                'data-parsley-validate' => ''
            ]) !!}
<div class="row">
    <div class="input-field">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', $notebook->title, [
            'required' => '',
            'data-parsley-required-message' => 'Title is required',
            'minlength' => '3'
        ]) !!}
    </div>
</div>
<div class="row">
    <div class="input-field">
        {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description', $notebook->description, [
            'class' => 'materialize-textarea',
            'required' => '',
            'data-parsley-required-message' => 'Description is required',
            'minlength' => '3'
        ]) !!}
    </div>
</div>
<div class="row">
    <div class="file-field input-field">
        <div class="btn light-blue darken-4">
            <i class="material-icons">perm_media</i>
            {!! Form::file('image') !!}
        </div>
        <div class="file-path-wrapper">
            {!! Form::text('', null, [
                'class' => 'file-path validate',
                'placeholder' => 'Select an image'
            ]) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="right">
        <button class="btn waves-effect waves-light light-blue darken-4" type="submit">
            Save
        </button>
        <a href="{{ url('/notebooks') }}" class="waves-effect waves-light btn red darken-1">
            Cancel
        </a>
    </div>
</div>
{!! Form::close() !!}
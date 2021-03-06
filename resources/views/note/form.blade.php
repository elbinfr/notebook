{!! Form::open(['url' => $url,
                'method' => $method,
                'files' => 'true',
                'data-parsley-validate' => ''
            ]) !!}
<div class="row">
    <div class="input-field">
        {!! Form::label('title', 'Título') !!}
        {!! Form::text('title', $note->title, [
            'required' => '',
            'data-parsley-required-message' => 'Se requiere un título',
            'minlength' => '3'
        ]) !!}
    </div>
</div>
<div class="row">
    <div class="input-field">
        {!! Form::label('content', 'Contenido') !!}
        {!! Form::textarea('content', $note->content, [
            'class' => 'materialize-textarea',
            'required' => '',
            'data-parsley-required-message' => 'Se requiere un contenido',
            'minlength' => '3'
        ]) !!}
    </div>
</div>
<div class="row">
    <div class="right">
        <button class="btn waves-effect waves-light light-blue darken-4" type="submit">
            Guardar
        </button>
        <a href="{{ url('/notebooks/'.session()->get('notebook')->slug.'/open') }}" class="waves-effect waves-light btn red darken-1">
            Cancelar
        </a>
    </div>
</div>
{!! Form::close() !!}
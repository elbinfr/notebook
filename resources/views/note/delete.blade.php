{!! Form::open([
    'url' => '/notes/'.$note->id,
    'method' => 'DELETE',
    'class' => 'form-delete inline-block',
    'data-title' => $note->title
 ]) !!}
<input type="submit" class="btn-action no-padding no-margin no-input brown-text" value="Eliminar">
{!! Form::close() !!}
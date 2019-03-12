{!! Form::open([
    'url' => '/notebooks/'.$notebook->id,
    'method' => 'DELETE',
    'class' => 'form-delete inline-block',
    'data-title' => $notebook->title
 ]) !!}
    <input type="submit" class="btn-action no-padding no-margin no-input" value="Eliminar">
{!! Form::close() !!}
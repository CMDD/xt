<a href="{{url('detalle',$id)}}">
  <button type="button" class="btn btn-default" name="button">Ver</button>
</a>

<a href="{{url('editar',$id)}}">
  <button type="button" class="btn btn-default" name="button">Editar</button>
</a>

@can('eliminar.titular')
<a class="btn btn-danger" href="{{url('eliminar-titular',$id)}}"
onclick="return confirm('¿Seguro que deseas eliminarlo?')">
<span aria-hidden="true" class="glyphicon glyphicon-trash">
</span>
</a>
@endcan

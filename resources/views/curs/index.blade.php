@extends('masteradmin')

@section('content')
<h2 class="mb-4">Cursos-Gestió</h2>
<a href="/curs/create" class="btn btn-primary text-light mb-4">Crear curs</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th class="w-100">Curs</th>
	  <th style="max-width:100px">Editar</th>
	  <th style="max-width:100px">Eliminar</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($cursos  as $curs)
    <tr>
      <td>
		<a href="" >{{$curs->curs}}</a>
	  </td>
	  <td style="max-width:100px">
	  		
		  <a href="/curs/edit/{{$curs->id}}" class="btn btn-primary text-light">
			<i class="fas fa-edit"></i>
		  </a>
	  </td>
	  <td style="max-width:100px">
		<form action="/curs/delete/{{$curs->id}}" method="post" onsubmit="return confirm('Estas segur d\'esborrar el curs?');">
			{{ method_field('DELETE') }}
			{{ csrf_field() }}
		  <button type="submit" class="btn btn-danger" value=""><i class='fas fa-trash-alt'></i></button>
		</form>
	  </td>
    </tr>
	@endforeach
  </tbody>
</table>

{{ $cursos->links("pagination::bootstrap-4") }}

@endsection

@extends('masteradmin')

@section('content')
<h2 class="mb-4">Categories-Gestió</h2>
<a href="/categoria/create" class="btn btn-primary text-light mb-4">Crear catergoria</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th class="w-100">Categoria</th>
	  <th style="max-width:100px">Editar</th>
	  <th style="max-width:100px">Eliminar</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($categorias  as $categoria)
    <tr>
      <td>
		<a href="" >{{$categoria->categoria}}</a>
	  </td>
	  <td style="max-width:100px">

		  <a href="/categoria/edit/{{$categoria->id}}" class="btn btn-primary text-light">
			<i class="fas fa-edit"></i>
		  </a>
	  </td>
	  <td style="max-width:100px">
		<form action="/categoria/delete/{{$categoria->id}}" method="post" onsubmit="return confirm('Estas segur d\'esborrar la categoria?');">
			{{ method_field('DELETE') }}
			{{ csrf_field() }}
		  <button type="submit" class="btn btn-danger" value=""><i class='fas fa-trash-alt'></i></button>
		</form>
	  </td>
    </tr>
	@endforeach
  </tbody>
</table>

{{$categorias->links("pagination::bootstrap-4")}}
@endsection

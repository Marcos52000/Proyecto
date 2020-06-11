@extends('masteradmin')

@section('content')
<h2 class="mb-4">Usuaris-Gestió</h2>
<a href="/user/create" class="btn btn-primary text-light mb-4">Crear usuari</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th style="width: 150px">Usuaris</th>
      <th style="width: 150px">Contrasenya</th>
      <th style="width: 150px">Correu Electronic</th>
	  <th style="width: 50px" >Editar</th>
	  <th style="width: 50px">Eliminar</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($usuarios  as $user)
    <tr>
      <td>
		<a href="" >{{$user->usuari}}</a>
	  </td>
	  <td>
		<a href="" >{{$user->contrasenya}}</a>
	  </td>
	  <td>
		<a href="" >{{$user->email}}</a>
	  </td>
	  <td style="max-width:100px">
	  		
		  <a href="/user/edit/{{$user->id}}" class="btn btn-primary text-light">
			<i class="fas fa-edit"></i>
		  </a>
	  </td>
	  <td style="max-width:100px">
		<form action="/user/delete/{{$user->id}}" method="post" onsubmit="return confirm('Estas segur d\'esborrar aquest usuari?');">
			{{ method_field('DELETE') }}
			{{ csrf_field() }}
		  <button type="submit" class="btn btn-danger" value=""><i class='fas fa-trash-alt'></i></button>
		</form>
	  </td>
    </tr>
	@endforeach
  </tbody>
</table>

{{ $usuarios->links("pagination::bootstrap-4") }}

@endsection

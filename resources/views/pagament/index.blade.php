@extends('masteradmin')

@section('content')
<h2 class="mb-4">Pagaments-Gestió</h2>
<a href="/gestiopagament/create" class="btn btn-primary text-light mb-4">Crear pagament</a>
<table class="table table-striped">
  <thead>
    <tr>
      <th style="width:30px">Categoria</th>
      <th style="width:300px">Compte</th>
      <th style="width:50px">Nivell</th>
      <th style="width:30px">Curs</th>
      <th style="width:300px">Titol</th>
      <th style="width:30px">Descripció</th>
      <th style="width:30px">Preu</th>
      <th style="width:30px">Data Inici</th>
      <th>Data fi</th>
      <th>Estat</th>
	  <th style="max-width:100px">Editar</th>
	  <th style="max-width:100px">Eliminar</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($pagaments  as $pagament)
    <tr>
    @foreach ($categorias  as $categoria)
    	@if($categoria->id == $pagament->categoria_id )
      	<td>
			<a href="" >{{$categoria->categoria}}</a>
	  	</td>
	  	@endif
	@endforeach 

	@foreach ($comptes  as $compte)
    	@if($compte->id == $pagament->compte_id )
     	<td>
			<a href="" >{{$compte->compte}}</a>
	  	</td>
	  	@endif
	@endforeach
		<td>
			<a href="" >{{$pagament->nivell}}</a>
	 	</td>
	@foreach ($cursos  as $curs)
    	@if($curs->id == $pagament->curs_id)
     	<td>
			<a href="" >{{$curs->curs}}</a>
	  	</td>
	  	@else
	  	<td>
			
		</td>
	  	@endif
	@endforeach
		
	 	<td>
			<a href="" >{{$pagament->titol}}</a>
	 	</td>
	 	<td>
			<a href="" >{{substr($pagament->descripcio,0,40)}}</a>
	 	</td>
	 	<td>
			<a href="" >{{$pagament->preu }}</a>
	 	</td>
	 	<td>
			<a href="" >{{$pagament->data_inici}}</a>
	 	</td>
	 	<td>
			<a href="" >{{$pagament->data_fi}}</a>
	 	</td>
	 	<td>
			<a href="" >{{$pagament->estat}}</a>
	 	</td>		
	  <td style="max-width:100px">
	  		
		  <a href="/gestiopagament/edit/{{$pagament->id}}" class="btn btn-primary text-light">
			<i class="fas fa-edit"></i>
		  </a>
	  </td>
	  <td style="max-width:100px">
		<form action="/gestiopagament/delete/{{$pagament->id}}" method="post" onsubmit="return confirm('Estas segur d\'esborrar aquest pagament?');">
			{{ method_field('DELETE') }}
			{{ csrf_field() }}
		  <button type="submit" class="btn btn-danger" value=""><i class='fas fa-trash-alt'></i></button>
		</form>
	  </td>
    </tr>
	@endforeach
  </tbody>
</table>
{{ $pagaments->links("pagination::bootstrap-4") }}
@endsection

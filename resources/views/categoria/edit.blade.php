@extends('masteradmin')

@section('content')
<form class='container' action="/categoria/edit/{{$categoria->id}}" method="Post">
  {!! csrf_field() !!}
  <div class="form-group">
 	<h3>Editar Categoria</h3>
    <label for="categoria">Categoria</label>
    <input type="text" class="form-control" name="categoria" id="categoria" value="{{$categoria->categoria}}">
    @if($errors->any())
    	<div style='height: 50px;' class="alert alert-danger"> 
    		<p>Introdueix una categoria valida</p>
    	</div>
    @endif	
  </div>
  <button type="submit" class="btn btn-primary">guardar</button>
  <a href="/categoria" class="btn btn-danger ml-4">cancela</a>
</form>
@endsection

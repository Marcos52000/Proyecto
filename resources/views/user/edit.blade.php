@extends('masteradmin')

@section('content')
<form class='container' action="/user/edit/{{$usuarios->id}}" method="Post">
  {!! csrf_field() !!}
 <div class="form-group">
    <h3 class="mb-4">Editar Usuari</h3>

    <label for="nom" class="mb-4">Nom:</label>
    <input type="text" class="form-control" name="nom" id="nom" value="{{$usuarios->usuari}}">
     @if($errors->has('non'))
      <div style='height: 50px;' class="alert alert-danger"> 
        <p>Introdueix un nom valid</p>
      </div>
    @endif
    <label for="pass" class="mb-4">Contrasenya:</label>
    <input type="password" class="form-control" name="pass" id="pass" value="{{$usuarios->contrasenya}}>
     @if($errors->has('pass'))
      <div style='height: 50px;' class="alert alert-danger"> 
        <p>Introdueix un nom valid</p>
      </div>
    @endif

    <br>

    <label for="correu" class="mb-4">Correu:</label>
    <input type="email" class="form-control" name="correu" id="correu" value="{{$usuarios->email}}">
     @if($errors->has('correu'))
      <div style='height: 50px;' class="alert alert-danger"> 
        <p>Introdueix un correu valid/Correu ja utilitçat</p>
      </div>
    @endif

    


  </div>
  <button type="submit" class="btn btn-primary">guardar</button>
  <a href="/user" class="btn btn-danger ml-4">cancela</a>
@endsection

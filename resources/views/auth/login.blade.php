@extends('master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="mb-4">Login</h2>
                </div>
                <div class="panel-body">
                    <form method="post" action="{{route('login')}}">
                        {{ csrf_field() }}

                        <div class="form-group">
                          
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" required autofocus>

                                @if ($errors->has('email'))
                                 <div style='height: 50px;' class="alert alert-danger">
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Contrasenya</label>

                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                 <div style='height: 50px;' class="alert alert-danger">
                                    <span class="help-block alert alert-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                </div>    
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
            
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="/password/reset">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

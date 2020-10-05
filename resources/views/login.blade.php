@extends('layouts.app')

@section('title', 'Dashboard')

@section('sidebar')
    @parent

@endsection

@section('content')
<div id="particles-js"></div>
	<div class="contenedor_login">
    
    <div class="container-fluid bloque_login">
      <div class="row">
        <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="block_log1">
                  <div class="logo">
                    <figure>
                      <img src="img/logo-umg.png" alt="" class="img-responsive center-block">
                    </figure>
                </div>
    <form method="POST" action="/login">
        @csrf
        <p>{{ $mensaje ?? '' }}</p>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-user-circle"></i></div>
                <input type="email" id="email"  name="email" class="form-control" id="" placeholder="User">
            </div>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                <input type="password" id="password" name="password" class="form-control" id="" placeholder="Password">
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8"><button type="submit" class="btn btn-default">Ingresar</button></div>
            <div class="col-md-2"></div>
        </div>
    </form>

    </div>
            </div>
        <div class="col-md-3"></div>
    </div>
    </div>
  
  </div>
@endsection

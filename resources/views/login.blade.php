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
        <div class="col-md-2"></div>
            <div class="col-md-5 block_log1-1">
                <div class="block_log1">
                <div class="logo_umg">
                    <img src="img/logo_umg1.png" alt="" class="img-responsive">
                </div>
                <h1 class="titulo_login text-center">¡BIENVENIDOS! <i class="fa fa-line-chart" aria-hidden="true"></i></h1>
                <div class="row">
                    <div class="col-md-6 text-justify">
                        <h3>Bienvenido al sistema de gestión comercial. <br><br> Por favor, ingrese con su usuario para administrar/usar el sistema.</h3>
                    </div>
                    <div class="col-md-6">
                    <figure>
                      <img src="img/login1.png" alt="" class="img-responsive img_center">
                    </figure>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-3 block_log2-2">
                <div class="block_log2">
                  <div class="logo">
                    <figure>
                      <img src="img/LogoNuevo2.png" alt="" width="85%" height="50%" class="img-responsive center-block">
                    </figure>
                </div>
                <form method="POST" action="/login">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user-circle"></i></div>
                            <input type="email" id="email"  name="email" class="form-control input_login" placeholder="User" required />
                        </div>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                            <input type="password" id="password" name="password" class="form-control input_login" placeholder="Password" required />
                        </div>
                    </div>
                    <p class="error_mensaje"> {{ $mensaje ?? '' }}</p>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <button type="submit" name="submit" id="submit" class="btn_login">Ingresar <i class="fa fa-sign-in" aria-hidden="true"></i></button>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </form>

    </div>
            </div>
        <div class="col-md-2"></div>
    </div>
    </div>

  </div>
@endsection

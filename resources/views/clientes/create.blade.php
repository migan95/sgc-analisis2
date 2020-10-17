@extends('layouts.admin')

@section('title', 'Crear cliente')

@section('sidebar')
    @parent

@endsection

@section('content')
    <div class="container-fluid">
        <h2 class="mt-4">Crear Cliente</h2>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">
    @if ($errors->any())
        <div>
            <p>Por favor corregir los siguientes errores:</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        </li>
    </ol>

    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf

        <div class="form-group">
        <label for="nombre">Nombre</label>
        <input class="form-control" id="nombre" type="text" name="nombre" placeholder="Nombre">
        </div>

        <div class="form-group">
        <label for="apellido">Apellido</label>
        <input class="form-control" id="apellido" type="text" name="apellido" placeholder="Apellido">
        </div>

        <div class="form-group">
        <label for="telefono">Telefono</label>
        <input class="form-control" id="telefono" type="text" name="telefono" placeholder="Telefono">
        </div>

        <div class="form-group">
        <label for="email">Correo</label>
        <input class="form-control" id="email" type="email" name="correo" placeholder="Correo">
        </div>

        <div class="form-group">
        <label for="direccion">Direccion</label>
        <input class="form-control" id="direccion" type="text" name="direccion" placeholder="Direccion">
        </div>

        <div class="form-group">
        <label for="nit">Nit</label>
        <input class="form-control" id="nit" type="text" name="nit" placeholder="Nit">
        </div>


        <button type="submit" value="Crear" class="btn btn-primary"/>Crear <i class="fas fa-user-plus"></i>

    </form>
    </div>
@endsection

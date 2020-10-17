@extends('layouts.admin')

@section('title', 'Editar cliente')

@section('sidebar')
    @parent

@endsection

@section('content')
    <div class="container-fluid">
        <h2 class="mt-4">Editar Cliente</h2>

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

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
        <label for="name">Nombre</label>
        <input class="form-control" id="name" type="text" name="nombre" placeholder="Nombre" value="{{ $cliente->nombre }}">
        </div>

        <div class="form-group">
        <label for="apellido">Apellido</label>
        <input class="form-control" id="apellido" type="text" name="apellido" placeholder="Apellido" value="{{ $cliente->apellido }}">
        </div>

        <div class="form-group">
        <label for="telefono">Telefono</label>
        <input class="form-control" id="telefono" type="text" name="telefono" placeholder="Telefono" value="{{ $cliente->telefono }}">
        </div>

        <div class="form-group">
        <label for="email">Correo</label>
        <input class="form-control" id="email" type="email" name="correo" placeholder="Correo" value="{{ $cliente->correo }}">
        </div>

        <div class="form-group">
        <label for="direccion">Direccion</label>
        <input class="form-control" id="direccion" type="text" name="direccion" placeholder="Direccion" value="{{ $cliente->direccion }}">
        </div>

        <div class="form-group">
        <label for="nit">Nit</label>
        <input class="form-control" id="nit" type="text" name="nit" placeholder="Nit" value="{{ $cliente->nit }}">
        </div>

        <button type="submit" value="Crear" class="btn btn-primary"/>Editar <i class="fas fa-check"></i>


    </form>
    </div>
@endsection

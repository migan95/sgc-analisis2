@extends('layouts.admin')

@section('title', 'Editar cliente')

@section('sidebar')
    @parent

@endsection

@section('content')
    <h2>Editar cliente</h2>

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

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nombre</label>
        <input id="name" type="text" name="nombre" placeholder="Nombre" value="{{ $cliente->nombre }}">

        <label for="apellido">Apellido</label>
        <input id="apellido" type="text" name="apellido" placeholder="Apellido" value="{{ $cliente->apellido }}">

        <label for="telefono">Telefono</label>
        <input id="telefono" type="text" name="telefono" placeholder="Telefono" value="{{ $cliente->telefono }}">

        <label for="email">Correo</label>
        <input id="email" type="email" name="correo" placeholder="Correo" value="{{ $cliente->correo }}">

        <label for="direccion">Direccion</label>
        <input id="direccion" type="text" name="direccion" placeholder="Direccion" value="{{ $cliente->direccion }}">

        <label for="nit">Nit</label>
        <input id="nit" type="text" name="nit" placeholder="Nit" value="{{ $cliente->nit }}">

        <input type="submit" value="Editar" />

    </form>
@endsection

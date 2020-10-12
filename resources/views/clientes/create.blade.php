@extends('layouts.admin')

@section('title', 'Crear cliente')

@section('sidebar')
    @parent

@endsection

@section('content')
    <h2>Crear cliente</h2>

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

    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf


        <label for="nombre">Nombre</label>
        <input id="nombre" type="text" name="nombre" placeholder="Nombre">

        <label for="apellido">Apellido</label>
        <input id="apellido" type="text" name="apellido" placeholder="Apellido">

        <label for="telefono">Telefono</label>
        <input id="telefono" type="text" name="telefono" placeholder="Telefono">

        <label for="email">Correo</label>
        <input id="email" type="email" name="correo" placeholder="Correo">

        <label for="direccion">Direccion</label>
        <input id="direccion" type="text" name="direccion" placeholder="Direccion">

        <label for="nit">Nit</label>
        <input id="nit" type="text" name="nit" placeholder="Nit">

        <input type="submit" value="Crear" />

    </form>
@endsection

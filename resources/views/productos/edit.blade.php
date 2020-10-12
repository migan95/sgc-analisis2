@extends('layouts.admin')

@section('title', 'Editar producto')

@section('sidebar')
    @parent

@endsection

@section('content')
    <h2>Editar producto</h2>

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

    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nombre</label>
        <input id="name" type="text" name="nombre_producto" placeholder="Nombre" value="{{ $producto->nombre_producto }}">

        <label for="apellido">Descripcion</label>
        <textarea id="apellido" name="descrip_producto" placeholder="Descripcion">{{ $producto->descrip_producto }}</textarea>

        <input id="telefono" type="hidden" name="id_proveedor" value="0">

        <label for="existencias">Existencias</label>
        <input id="existencias" type="number" name="num_existencias" placeholder="Existencias" value="{{ $producto->num_existencias }}">

        <label for="precio">Precio</label>
        <input id="precio" type="number" name="precio_productos" placeholder="Precio" value="{{ $producto->precio_productos }}">

        <input type="submit" value="Editar" />

    </form>
@endsection

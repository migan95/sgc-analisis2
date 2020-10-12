@extends('layouts.admin')

@section('title', 'Crear producto')

@section('sidebar')
    @parent

@endsection

@section('content')
    <h2>Crear producto</h2>

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

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf


        <label for="nombre">Nombre</label>
        <input id="nombre" type="text" name="nombre_producto" placeholder="Nombre">

        <label for="desc">Descripcion</label>
        <textarea id="desc" name="descrip_producto" placeholder="Descripcion"></textarea>

        <input id="telefono" type="hidden" name="id_proveedor" value="0">

        <label for="existencias">Existencias</label>
        <input id="existencias" type="number" name="num_existencias" placeholder="Existencias">

        <label for="precio">Precio</label>
        <input id="precio" type="number" name="precio_productos" placeholder="Precio">

        <input type="submit" value="Crear" />

    </form>
@endsection

@extends('layouts.admin')

@section('title', 'Crear producto')

@section('sidebar')
    @parent

@endsection

@section('content')
<div class="container-fluid">
    <h2 class="mt-4">Crear producto</h2>
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

    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="sku">SKU</label>
        <input id="sku" type="text" name="sku" placeholder="SKU">
        <label for="nombre">Nombre</label>
        <input id="nombre" type="text" name="nombre_producto" placeholder="Nombre">

        <label for="desc">Descripcion</label>
        <textarea id="desc" name="descrip_producto" placeholder="Descripcion"></textarea>

        <label for="categoria">Categoría</label>
        <select id="categoria" name="id_categoria">
            <option value="0">Seleccionar...</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select>

        <label for="marca">Marca</label>
        <select id="marca" name="id_marca">
            <option value="0">Seleccionar...</option>
            @foreach ($marcas as $marca)
                <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
            @endforeach
        </select>

        <label for="proveedor">Proveedor</label>
        <select id="proveedor" name="id_proveedor">
            <option value="0">Seleccionar...</option>
            @foreach ($proveedores as $proveedor)
                <option value="{{ $proveedor->id }}">{{ $proveedor->nombre_proveedor }}</option>
            @endforeach
        </select>

        <label for="precio_compra">Precio de Compra</label>
        <input id="precio_compra" type="number" name="precio_compra" placeholder="Precio de compra">

        <label for="precio_venta">Precio de Venta</label>
        <input id="precio_venta" type="number" name="precio_productos" placeholder="Precio de venta">

        <label for="existencias">Inventario</label>
        <input id="existencias" type="number" name="num_existencias" placeholder="Existencias">

        <label for="imagen">Imagen</label>
        <input id="imagen" type="file" name="imagen">

        <input type="submit" value="Crear" />

    </form>
</div>    
@endsection

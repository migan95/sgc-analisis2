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


        <div class="form-group">
            <label for="SKU">SKU</label>
            <input class="form-control" id="SKU" type="text" name="sku" placeholder="SKU">
        </div>

            <div class="form-group">
                <label for="precio_compra">Precio Compra</label>
                <input class="form-control" id="precio_compra" type="number" name="precio_compra" placeholder="Precio_compra">
            </div>

            <div class="form-group">
                <label for="precio_venta">Precio Venta</label>
                <input class="form-control" id="precio_venta" type="number" name="precio_productos" placeholder="Precio_venta">
            </div>

        <label for="categoria">Categoría</label>
        <select class="form-control" id="categoria" name="id_categoria">
            <option value="0">Seleccionar...</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select>

        <label for="marca">Marca</label>
        <select class="form-control" id="marca" name="id_marca">
            <option value="0">Seleccionar...</option>
            @foreach ($marcas as $marca)
                <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
            @endforeach
        </select>

        <label for="proveedor">Proveedor</label>
        <select class="form-control" id="proveedor" name="id_proveedor">
            <option value="0">Seleccionar...</option>
            @foreach ($proveedores as $proveedor)
                <option value="{{ $proveedor->id }}">{{ $proveedor->nombre_proveedor }}</option>
            @endforeach
        </select>

        <label for="precio_compra">Precio de Compra</label>
        <input class="form-control" id="precio_compra" type="number" name="precio_compra" placeholder="Precio de compra">

        <label for="precio_venta">Precio de Venta</label>
        <input class="form-control" id="precio_venta" type="number" name="precio_productos" placeholder="Precio de venta">

        <label for="existencias">Inventario</label>
        <input class="form-control" id="existencias" type="number" name="num_existencias" placeholder="Existencias">


        <label for="imagen">Imagen</label>
        <input  id="imagen" type="file" name="imagen" >

        <div>
            <button type="submit" value="Crear" class="">Crear <i class="fas fa-check"></i></button>
        </div>
        </form>
    </div>
@endsection

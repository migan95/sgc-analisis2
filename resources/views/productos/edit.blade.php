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

    <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')



        <label for="sku">SKU</label>
        <input id="sku" type="text" name="sku" placeholder="SKU" value="{{ $producto->sku }}">

        <label for="nombre">Nombre</label>
        <input id="name" type="text" name="nombre_producto" placeholder="Nombre" value="{{ $producto->nombre_producto }}">

        <label for="desc">Descripcion</label>
        <textarea id="apellido" name="descrip_producto" placeholder="Descripcion">{{ $producto->descrip_producto }}</textarea>

        <label for="categoria">Categoría</label>
        <select id="categoria" name="id_categoria">
            <option value="0">Seleccionar...</option>
            @foreach ($categorias as $categoria)
                <option
                    value="{{ $categoria->id }}"
                    selected="{{ $categoria->id == $producto->id_categoria }}">
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select>

        <label for="marca">Marca</label>
        <select id="marca" name="id_marca">
            <option value="0">Seleccionar...</option>
            @foreach ($marcas as $marca)
                <option
                    value="{{ $marca->id }}"
                    selected="{{ $marca->id == $producto->id_marca }}">
                    {{ $marca->nombre }}
                </option>
            @endforeach
        </select>

        <label for="proveedor">Proveedor</label>
        <select id="proveedor" name="id_proveedor">
            <option value="0">Seleccionar...</option>
            @foreach ($proveedores as $proveedor)
                <option
                    value="{{ $proveedor->id }}"
                    selected="{{ $producto->id_proveedor == $proveedor->id }}" >
                    {{ $proveedor->nombre_proveedor }}
                </option>
            @endforeach
        </select>

        <label for="precio_compra">Precio de Compra</label>
        <input id="precio_compra" type="number" name="precio_compra" placeholder="Precio de compra" value="{{ $producto->precio_compra }}">

        <label for="precio_venta">Precio de Venta</label>
        <input id="precio" type="number" name="precio_productos" placeholder="Precio de venta" value="{{ $producto->precio_productos }}">

        <label for="existencias">Inventario</label>
        <input id="existencias" type="number" name="num_existencias" placeholder="Inventario" value="{{ $producto->num_existencias }}">

        <label for="imagen">Imagen</label>
        <input id="imagen" type="file" name="imagen" placeholder="Subir imagen en caso sea necesario">

        <input type="submit" value="Editar" />

    </form>
@endsection

@extends('layouts.admin')

@section('title', 'Ver producto')

@section('sidebar')
    @parent

@endsection

@section('content')

    <h2>Detalle de producto</h2>

    <strong>SKU:</strong>
    <span>{{ $producto->sku }} </span>

    <strong>Nombre:</strong>
    <span>{{ $producto->nombre_producto }}</span>

    <strong>Descripcion:</strong>
    <span>{{ $producto->descrip_producto }}</span>

    <strong>Categoria:</strong>
    <span>{{ $categoria }}</span>

    <strong>Marca:</strong>
    <span>{{ $marca }}</span>

    <strong>Proveedor:</strong>
    <span>{{ $proveedor }}</span>

    <strong>Precio compra:</strong>
    <span>{{ $producto->precio_compra }}</span>

    <strong>Precio Venta:</strong>
    <span>{{ $producto->precio_productos }}</span>

    <strong>Existencias:</strong>
    <span>{{ $producto->num_existencias }}</span>

    <strong>Imagen:</strong>
    <img src="{{  asset($producto->imagen)  }}" alt="imagen"/>
@endsection

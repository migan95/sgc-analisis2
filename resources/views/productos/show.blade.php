@extends('layouts.admin')

@section('title', 'Ver producto')

@section('sidebar')
    @parent

@endsection

@section('content')
    <h2>Detalle de producto</h2>

    <strong>Nombre:</strong>
    <span>{{ $producto->nombre_producto }}</span>

    <strong>Descripcion:</strong>
    <span>{{ $producto->descrip_producto }}</span>

    <strong>Existencias:</strong>
    <span>{{ $producto->num_existencias }}</span>

    <strong>Precio:</strong>
    <span>{{ $producto->precio_productos }}</span>
@endsection

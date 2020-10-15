@extends('layouts.admin')

@section('title', 'Productos')

@section('sidebar')
    @parent

@endsection

@section('content')
<div class="container-fluid">
    <h2 class="mt-4">Productos</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">
        </li>
    </ol>
    <p>{{ $mensaje ?? '' }}</p>

    <a href="{{ route('productos.create') }}">Crear</a>

    <div class="row">
        <div class="col-md-6">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>SKU</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Existencias</th>
                    <th>Precio Compra</th>
                    <th>Precio Venta</th>
                    <th>Categoria</th>
                    <th>Marca</th>
                    <th>Proveedor</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->sku }}</td>
                        <td>{{ $producto->nombre_producto }}</td>
                        <td>{{ $producto->descrip_producto }}</td>
                        <td>{{ $producto->num_existencias }}</td>
                        <td>{{ $producto->precio_compra }}</td>
                        <td>{{ $producto->precio_productos }}</td>
                        <td>{{ $producto->id_categoria }}</td>
                        <td>{{ $producto->id_marca }}</td>
                        <td>{{ $producto->id_proveedor }}</td>

                        <td>
                            <form action="{{ route('productos.destroy',$producto->id) }}" method="POST">
                                <a href="{{ route('productos.show',$producto->id) }}">Ver</a>
                                <a href="{{ route('productos.edit',$producto->id) }}">Editar</a>

                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Borrar">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-6"></div>
    </div>
</div>
@endsection

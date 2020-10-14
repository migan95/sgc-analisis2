@extends('layouts.admin')

@section('title', 'Productos')

@section('sidebar')
    @parent

@endsection

@section('content')
    <h2>Productos</h2>
    <p>{{ $mensaje ?? '' }}</p>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio Compra</th>
            <th>Precio Venta</th>
            <th>Inventario</th>
        </tr>
        @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->nombre_producto }}</td>
                <td>{{ $producto->descrip_producto }}</td>
                <td>{{ $producto->precio_compra }}</td>
                <td>{{ $producto->precio_productos }}</td>
                <td>{{ $producto->num_existencias }}</td>

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
    </table>
@endsection

@extends('layouts.admin')

@section('title', 'Buscar Producto')

@section('sidebar')
    @parent

@endsection

@section('content')
    <div class="container-fluid">
        <h2 class="mt-4">Buscar Producto:</h2>

        <div class="form-group">
            <input type="search" id="buscar_producto" name="buscar producto" placeholder="Producto a buscar" class="form-control">
        </div>

        <table class="table">
            <thead>
            <tr>

                <th scope="col">SKU:</th>
                <th scope="col">Nombre:</th>
                <th scope="col">Descripcion:</th>
                <th scope="col">Existencias:</th>
                <th scope="col">Precio compra:</th>
                <th scope="col">Precio Venta:</th>
                <th scope="col">Categoria:</th>
                <th scope="col">Marca:</th>
                <th scope="col">Proveedor:</th>
            </tr>
            </thead>

        </table>
    </div>
@endsection

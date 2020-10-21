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
    <div class="card mb-4">
    <div class="card-header"> 
        <h5><button type="button" class="btn btn-outline-info" onclick="history.go(-1);"><i class="fas fa-arrow-circle-left"></i> </button> Crear producto - Sistema de Gestion de Inventarios.</h5>
    </div>
    <div class="card-body">   
        <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="sku">SKU</label>
                        <input id="sku" type="text" name="sku" placeholder="SKU" value="" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="precio_compra">Precio de Compra Q</label>
                        <input class="form-control" id="precio_compra" type="number" name="precio_compra" placeholder="Q" value="">
                    </div>
                    <div class="form-group">
                        <label for="existencias">Inventario</label>
                        <input class="form-control" id="existencias" type="number" name="num_existencias" placeholder="Inventario" value="">            
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoría</label>
                        <select class="form-control" id="categoria" name="id_categoria">
                            <option value="0">Seleccionar...</option>
                            @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="desc">Descripcion</label>
                        <textarea class="form-control" id="descrip_producto" name="descrip_producto" placeholder="Descripcion" rows="3"></textarea>
                    </div>

                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input class="form-control" id="name" type="text" name="nombre_producto" placeholder="Nombre" value="">
                    </div>
                    <div class="form-group">
                        <label for="precio_venta">Precio de Venta Q</label>
                        <input class="form-control" id="precio" type="number" name="precio_productos" placeholder="Q" value="">
                    </div>
                    <div class="form-group">
                        <label for="proveedor">Proveedor</label>
                        <select class="form-control" id="proveedor" name="id_proveedor">
                            <option value="0">Seleccionar...</option>
                            @foreach ($proveedores as $proveedor)
                            <option value="{{ $proveedor->id }}">{{ $proveedor->nombre_proveedor }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="marca">Marca</label>
                        <select class="form-control" id="marca" name="id_marca">
                            <option value="0">Seleccionar...</option>
                            @foreach ($marcas as $marca)
                                <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Agregar Imagen</label>
                        <input type="file" class="form-control-file" id="imagen" name="imagen">
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <button type="submit" value="Crear" class="btn_crear_product">Crear <i class="fas fa-check"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </form> 
    </div>      
</div>
@endsection

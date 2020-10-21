@extends('layouts.admin')

@section('title', 'Editar producto')

@section('sidebar')
    @parent

@endsection

@section('content')
<div class="container-fluid">
    <h2 class="mt-4">Editar producto</h2>
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
            <div class="row">
                <div class="col-md-5">
                    <h4><button type="button" class="btn btn-outline-info" onclick="history.go(-1);"><i class="fas fa-arrow-circle-left"></i> </button> {{ $producto->nombre_producto }}</h4>
                </div>
                <div class="col-md-7 text-right">
                </div>
            </div>
    </div>
    <div class="card-body">   
        <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="sku">SKU</label>
                        <input id="sku" type="text" name="sku" placeholder="SKU" value="{{ $producto->sku }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="precio_compra">Precio de Compra Q</label>
                        <input class="form-control" id="precio_compra" type="number" name="precio_compra" placeholder="Precio de compra" value="{{ $producto->precio_compra }}">
                    </div>
                    <div class="form-group">
                        <label for="existencias">Inventario</label>
                        <input class="form-control" id="existencias" type="number" name="num_existencias" placeholder="Inventario" value="{{ $producto->num_existencias }}">
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoría</label>
                        <select class="form-control" id="categoria" name="id_categoria">
                        <option value="0">Seleccionar...</option>
                        @foreach ($categorias as $categoria)
                            <option
                                value="{{ $categoria->id }}"
                                selected="{{ $categoria->id == $producto->id_categoria }}">
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="desc">Descripcion</label>
                        <textarea class="form-control" id="apellido" name="descrip_producto" placeholder="Descripcion">{{ $producto->descrip_producto }}</textarea>
                    </div>

                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input class="form-control" id="name" type="text" name="nombre_producto" placeholder="Nombre" value="{{ $producto->nombre_producto }}">
                    </div>
                    <div class="form-group">
                        <label for="precio_venta">Precio de Venta Q</label>
                        <input class="form-control" id="precio" type="number" name="precio_productos" placeholder="Precio de venta" value="{{ $producto->precio_productos }}">
                    </div>
                    <div class="form-group">
                        <label for="proveedor">Proveedor</label>
                        <select class="form-control" id="proveedor" name="id_proveedor">
                            <option value="0">Seleccionar...</option>
                            @foreach ($proveedores as $proveedor)
                                <option
                                    value="{{ $proveedor->id }}"
                                    selected="{{ $producto->id_proveedor == $proveedor->id }}" >
                                    {{ $proveedor->nombre_proveedor }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="marca">Marca</label>
                        <select class="form-control" id="marca" name="id_marca">
                            <option value="0">Seleccionar...</option>
                            @foreach ($marcas as $marca)
                                <option
                                    value="{{ $marca->id }}"
                                    selected="{{ $marca->id == $producto->id_marca }}">
                                    {{ $marca->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Agregar Imagen</label>
                        <input class="form-control-file" id="imagen" type="file" name="imagen" placeholder="Subir imagen en caso sea necesario">
                        <!--img id="imgSalida" width="50%" height="50%" src="" />
                        <i class="far fa-window-close"></i-->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="reset" value="cancelar" class="btn_reset_product">Revertir Cambios <i class="fas fa-history"></i></button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" value="Crear" class="btn_crear_product">Editar <i class="fas fa-check"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </form> 
    </div> 
    </form>
</div>    
@endsection

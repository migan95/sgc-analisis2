@extends('layouts.admin')

@section('title', 'Ver producto')

@section('sidebar')
    @parent

@endsection

@section('content')
<div class="container-fluid">
    <h2 class="mt-4">Detalle de producto</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">
            {{ $mensaje ?? '' }}
        </li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <h4>{{ $producto->nombre_producto }}</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 img-contenedor-detalle_pross">
                    <img src="{{  asset($producto->imagen)  }}" alt="imagen" class="img_detalle_product" />
                </div>
                <div class="col-md-6">
                    <div class="card" style="width: 100%; margin-top:20px;">
                        <div class="card-body">
                            <h6 class="card-title">SKU : <label for="" class="card-subtitle mb-2 text-muted">{{ $producto->sku }}</label></h6>
                            <h6 class="card-title">Precio compra: <label class="card-subtitle mb-2 text-muted">Q {{ $producto->precio_compra }}.00</label></h6>
                            <h6 class="card-title">Precio Venta: <label class="card-subtitle mb-2 text-muted">Q {{ $producto->precio_productos }}.00</label></h6>
                            <h6 class="card-title">Existencias: <label class="card-subtitle mb-2 text-muted">{{ $producto->num_existencias }}</label></h6>
                            <h6 class="card-title">Categoria</h6>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $categoria }}</h6>
                            <h6 class="card-title">Marca</h6>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $marca }}</h6>
                            <h6 class="card-title">Proveedor</h6>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $proveedor }}</h6>
                            <h6 class="card-title">Descripcion</h6>
                            <p class="card-subtitle mb-2 text-muted">{{ $producto->descrip_producto }}</p>
                            <div style="margin-top:20px;">
                                <a href="{{ route('productos.index') }}" class="card-link">Regresar Productos</a>
                                <a href="{{ route('productos.edit',$producto->id) }}" class="card-link">Editar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>      
@endsection

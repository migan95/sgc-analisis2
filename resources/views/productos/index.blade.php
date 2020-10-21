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
            {{ $mensaje ?? '' }}
        </li>
    </ol>
<div class="card mb-4">
    <div class="card-header">
            <div class="row">
                <div class="col-md-5">
                    <i class="fas fa-table mr-1"></i>
                    Listado de productos
                </div>
                <div class="col-md-7 text-right">
                    <a href="{{ route('productos.create') }}" class="btn btn-outline-success" >Crear Nuevo <i class="fas fa-plus"></i></a> 
                </div>
            </div>
    </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-sm" id="dataTable_Products" width="100%" cellspacing="0">
                    <thead >
                        <tr>
                        <th>Imagen</th>
                        <th>SKU</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Existencias</th>
                        <th>Precio Compra</th>
                        <th>Precio Venta</th>
                        <th>Categoria</th>
                        <th >Ver</th>
                        <th >Editar</th>
                        <th >Borrar</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($productos as $producto)
                            <tr>
                                <td class="container-image">
                                    <a data-toggle="modal" data-target="#modal-imagen-{{ $producto->id }}">
                                        <img src="{{  asset($producto->imagen)  }}"  alt="imagen" class="img_list_products"/>
                                        <div class="middle">
                                            <div class="text">Ver Imagen</div>
                                        </div>
                                    </a>
                                </td>
                                <td class="txt-product">{{ $producto->sku }}</td>
                                <td>{{ $producto->nombre_producto }}</td>
                                <td>{{ $producto->descrip_producto }}</td>
                                <td class="txt-product">{{ $producto->num_existencias }}</td>
                                <td class="txt-product">Q {{ $producto->precio_compra }}.00</td>
                                <td class="txt-product">Q {{ $producto->precio_productos }}.00</td>
                                <td class="txt-product">
                                    @foreach ($categorias as $categoria)
                                        @if($producto->id_categoria == $categoria->id)
                                            {{ $categoria->nombre }}
                                        @endif
                                    @endforeach
                                </td>
                                <td class="txt-product"><a href="{{ route('productos.show',$producto->id) }}"><i class="icon_pro fas fa-eye"></i></a> </td>
                                <td class="txt-product"><a href="{{ route('productos.edit',$producto->id) }}"><i class="icon_pro fas fa-edit"></i></a> </td>
                                <td colspan="2" class="txt-product">
                                    <form action="{{ route('productos.destroy',$producto->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn_eliminar_user"><i class="icon_pro fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    @foreach ($productos as $producto)
    <!-- Modal vista imagen-->
    <div class="modal fade" id="modal-imagen-{{ $producto->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ $producto->nombre_producto }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <img src="{{  asset($producto->imagen)  }}" alt="imagen" class="img_modal_products"/>
        </div>
        </div>
    </div>
    </div>


    @endforeach
@endsection

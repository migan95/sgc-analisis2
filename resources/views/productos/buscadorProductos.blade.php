@extends('layouts.admin')

@section('title', 'Buscar Producto')

@section('sidebar')
    @parent

@endsection

@section('content')
    <div class="container-fluid">
        <h2 class="mt-4">Buscar Producto:</h2>

        <div class="form-group">
            <input type="search" id="buscar_producto" name="buscar producto" placeholder="Producto a buscar"
                   class="form-control"
                   onkeyup="getProductos()">
        </div>

        <table class="table table-hover  table-sm" id="dataTable_Products">
            <thead>
            <tr>
            
                <th scope="col">SKU:</th>
                <th scope="col">Nombre:</th>
                <th scope="col">Descripcion:</th>
                <th scope="col">Existencias:</th>
{{--                <th scope="col">Precio compra:</th>--}}
                <th scope="col">Precio Venta:</th>
{{--                <th scope="col">Categoria:</th>--}}
{{--                <th scope="col">Marca:</th>--}}
{{--                <th scope="col">Proveedor:</th>--}}
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

    <script>
        function getProductos() {
            var txtBusqueda = $('#buscar_producto').val();
            var formData = {
                _token: '<?php echo csrf_token() ?>',
                busqueda: txtBusqueda
            }
            console.log(formData);

            $.ajax({
                type: 'POST',
                url: '/buscadorProductos',
                data: formData,

                success: function (data) {
                    var contenido = "";
                    $.each( data, function( key, items ) {
                        $.each( items, function( k, item ) {
                            var fila = "<tr>" +
                                "<td class='txt-product'>" + item.sku + "</th>" +
                                "<td class='txt-product'>" + item.nombre_producto + "</th>" +
                                "<td class='txt-product'>" + item.descrip_producto + "</th>" +
                                "<td class='txt-product'>" + item.num_existencias + "</th>" +
                                // "<td class='txt-product'>" + item.precio_compra + "</th>" +
                                "<td class='txt-product'>" + item.precio_productos + "</th>" +
                                "</tr>";
                            contenido = contenido + fila;
                        });
                    });
                    $('tbody').html(contenido);
                }
            });
        }
    </script>
@endsection

@extends('layouts.app')

@section('content')
    <body style="background: url('fondo.jpg') no-repeat; background-size: cover;">

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
            <div class="panel-heading">
                <h1 class="panel-title">Ingresar Productos</h1>
            </div>
                <div class="panel-body">
                    <form>
                        <div class="form-group">
                            <label for="Producto">Producto:</label>
                            <input class="form-control" type="Producto" name="Producto" placeholder="Ingrese el Producto">

                        </div>
                        <div class="form-group">
                            <label for="Precio">Precio:</label>
                            <input class="form-control" type="Precio" name="Precio" placeholder="Ingrese el Precio del producto">

                        </div>
                        <div class="form-group">
                            <label for="Cantidad">Cantidad de productos:</label>
                            <input class="form-control" type="Cantidad" name="Precio" placeholder="Cantidad de productos a ingresar">

                        </div>
                        <button Class="btn btn-primary ">Ingresar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


    </body>

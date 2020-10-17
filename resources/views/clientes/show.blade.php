@extends('layouts.admin')

@section('title', 'Ver cliente')

@section('sidebar')
    @parent

@endsection

@section('content')
    <div class="container-fluid">

        <h2 class="mt-4">Detalle de Clientes</h2>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">
            </li>
        </ol>

        <div class="row">
            <div class="col-md-6">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Nombre:</th>
                        <th>Apellido:</th>
                        <th>Telefono:</th>
                        <th>Correo:</th>
                        <th>Direccion:</th>
                        <th>Nit:</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $cliente->nombre }}</td>
                        <td>{{ $cliente->apellido }}</td>
                        <td>{{ $cliente->telefono }}</td>
                        <td>{{ $cliente->correo }}</td>
                        <td>{{ $cliente->direccion }}</td>
                        <td>{{ $cliente->nit }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

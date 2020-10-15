@extends('layouts.admin')

@section('title', 'Clientes')

@section('sidebar')
    @parent

@endsection

@section('content')
<div class="container-fluid">
    <h2 class="mt-4">Clientes <i class="fas fa-users"></i></h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{ $mensaje ?? '' }}</li>
    </ol>
    <table class="table table-hover">
        <thead>
            <tr>    
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Direccion</th>
            <th>Nit</th>
            <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->apellido }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->correo }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>{{ $cliente->nit }}</td>
                    <td>
                        <form action="{{ route('clientes.destroy',$cliente->id) }}" method="POST">
                            <a href="{{ route('clientes.show',$cliente->id) }}"><i class="icon_user fas fa-eye"></i></a>
                            <a href="{{ route('clientes.edit',$cliente->id) }}"><i class="icon_user fas fa-edit"></i></a>

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn_eliminar_user"><i class="icon_user fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

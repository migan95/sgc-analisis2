@extends('layouts.admin')

@section('title', 'Clientes')

@section('sidebar')
    @parent

@endsection

@section('content')
    <h2>Clientes</h2>
    <p>{{ $mensaje ?? '' }}</p>

    <a href="{{ route('clientes.create') }}">Crear</a>

    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Direccion</th>
            <th>Nit</th>
            <th>Acción</th>
        </tr>
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
                        <a href="{{ route('clientes.show',$cliente->id) }}">Ver</a>
                        <a href="{{ route('clientes.edit',$cliente->id) }}">Editar</a>

                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Borrar">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

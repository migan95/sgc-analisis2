@extends('layouts.app')

@section('title', 'Usuarios')

@section('sidebar')
    @parent

@endsection

@section('content')
    <h2>Usuarios</h2>
    <p>{{ $mensaje ?? '' }}</p>

    <a href="{{ route('users.create') }}">Crear</a>

    <table>
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Acción</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                        <a href="{{ route('users.show',$user->id) }}">Ver</a>
                        <a href="{{ route('users.edit',$user->id) }}">Editar</a>

                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Borrar">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

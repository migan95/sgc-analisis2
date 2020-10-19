@extends('layouts.admin')

@section('title', 'Editar categoria')

@section('sidebar')
    @parent

@endsection

@section('content')

    <div class="container-fluid">
        <h2 class="mt-4">Editar categoria: {{ $categoria->name }}</h2>
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
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input  id="name" type="text" name="nombre" placeholder="Nombre" value="{{ $categoria->nombre }}" class="form-control" />
                    </div>

                    <button type="submit" value="Editar" class="btn btn-primary">Editar <i class="fas fa-edit"></i></button>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection

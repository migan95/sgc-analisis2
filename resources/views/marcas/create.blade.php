@extends('layouts.admin')

@section('title', 'Crear marca')

@section('sidebar')
    @parent

@endsection

@section('content')

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h2 class="mt-4">Crear Nueva Marca</h2>
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
            <form action="{{ route('marcas.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input id="name" type="text" name="nombre" placeholder="Nombre" class="form-control">
                </div>
                <button type="submit" value="Crear" class="btn btn-primary">
                    Crear
                    <i class="fas fa-plus"></i>
                </button>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection

@extends('layouts.template_simple_creation')

@section('title', 'Editar Categoría')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3 border p-4 shadow bg-light">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-12">
                    <h3 class="fw-normal text-secondary fs-4 text-uppercase mb-4">Editar Autor</h3>
                </div>
                <form action="/categories/{{ $category->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Categoría" name="category" required
                            value="{{ $category->name }}">
                        </div>
                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-primary float-end" id="submit">Guardar Categoría</button>
                            <button type="submit" class="btn btn-outline-danger" form="deleteForm">Eliminar</button>
                            <button type="button" class="btn btn-outline-secondary float-end me-2">
                                <a href="/categories">Cancelar</a>
                            </button>
                        </div>
                </form>
                <div class="col-12 mt-5">
                    <form action="/categories/{{ $category->id }}" method="POST" class="d-inline" id="deleteForm"
                        onsubmit="return confirm('¿Estás seguro que deseas eliminar este autor?')">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

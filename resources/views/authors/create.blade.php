@extends('layouts.template_simple_creation')

@section('title', 'Nuevo Autor')

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
                <h3 class="fw-normal text-secondary fs-4 text-uppercase mb-4">Nuevo Autor</h3>
            </div>
            <form action="/authors" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Nombre" name="name" required="required">
                    </div>
                    <div class="col-12 mt-5">
                        <button type="submit" class="btn btn-primary float-end">Guardar Autor</button>
                        <button type="button" class="btn btn-outline-secondary float-end me-2">
                            <a href="/authors">Cancelar</a>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

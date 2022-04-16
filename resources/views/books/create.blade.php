@extends('layouts.template')

@section('title', 'Nuevo Libro')

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
                <h3 class="fw-normal text-secondary fs-4 text-uppercase mb-4">Nuevo Libro</h3>
            </div>
            <form action="/books" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <input type="number" class="form-control" placeholder="ISBN" name="ISBN" required="required" step="1"
                        onkeyup="this.value=this.value.replace(/[^\d]/,'')">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Nombre" name="name" required="required">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Editorial" name="publisher" required="required">
                    </div>
                    <div class="col-md-6">
                        <input type="number" class="form-control" placeholder="Total de páginas" name="total_pages" step="1">
                    </div>
                    <div class="col-md-6">
                        <input type="date" class="form-control" placeholder="Fecha de publicación" name="published_at">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Categoría" name="category">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="IMAGE_LINK" name="image_link">
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="aligns-items-center mt-3 col-lg-12">
                                <table class="table align-middle table-striped display nowrap" cellspacing="0" id="authors-table" width=100%>
                                    <thead class="bg-light text-center">
                                        <tr>
                                            <th></th>
                                            <th>Nombre</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($authors as $author)
                                            <tr class="text-center">
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="author[]" value="{{$author->id}}">
                                                    </div>
                                                </td>
                                                <td class ="fw-bold mb-1">{{$author->name}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-5">
                        <button type="submit" class="btn btn-primary float-end">Guardar libro</button>
                        <button type="button" class="btn btn-outline-secondary float-end me-2">
                            <a href="/books">Cancelar</a>
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

@section('table_name', 'authors-table')
@endsection

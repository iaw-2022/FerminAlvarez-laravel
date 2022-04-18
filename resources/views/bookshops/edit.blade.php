@extends('layouts.template')

@section('title', 'Nueva Librería')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-16 border p-4 shadow bg-light">
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
                    <h3 class="fw-normal text-secondary fs-4 text-uppercase mb-4">Editar librería</h3>
                </div>
                <form action="/bookshops/{{ $bookshop->id }}" method="POST" onsubmit="return confirm('¿Estás seguro que deseas realizar estos cambios?')">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Nombre" name="name"
                                value="{{ $bookshop->name }}">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Ciudad" name="city"
                                value="{{ $bookshop->city }}">
                        </div>
                        <div class="col-md-6">
                            <input type="text" step="1" class="form-control" placeholder="Calle"
                            name="street" value="{{ $bookshop->street }}">
                        </div>
                        <div class="col-md-6">
                            <input type="number" step="1" class="form-control" placeholder="Número" name="number"  value="{{ $bookshop->number }}">
                        </div>
                        <table class="table align-middle table-striped display nowrap" cellspacing="0" id="books-table"
                            width=100%>
                            <thead class="bg-light text-center">
                                <tr>
                                    <th>Imagen</th>
                                    <th>ISBN</th>
                                    <th>Nombre</th>
                                    <th>Editorial</th>
                                    <th>Fecha de publicación</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr class="text-center">
                                        <td>
                                            <img src="{{ $book->image_link }}" alt="imagen del libro {{ $book->name }}"
                                                class="img-thumbnail img-responsive book-img">
                                        </td>
                                        <td>{{ $book->ISBN }} <br>
                                            <div class="custom-control custom-checkbox">
                                                @if ($bookshop->books->contains($book))
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1"
                                                        name="books[]" value="{{ $book->ISBN }}" onclick="var input = document.getElementById('input{{ $book->ISBN }}');
                                                        if(this.checked){
                                                            input.disabled = false; input.focus();}
                                                        else{input.disabled=true;}" checked>

                                                    <input type="number" step="0.1" class="form-control"
                                                        placeholder="Indique su precio aquí" name="prices[]"
                                                        id="input{{ $book->ISBN }}" required="required"
                                                        value="{{ $bookshop->books->where('ISBN',$book->ISBN)->first()->pivot->price }}">
                                                @else
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1"
                                                        name="books[]" value="{{ $book->ISBN }}" onclick="var input = document.getElementById('input{{ $book->ISBN }}');
                                                        if(this.checked){
                                                            input.disabled = false; input.focus();}
                                                        else{input.disabled=true;}">

                                                    <input type="number" step="0.1" class="form-control"
                                                        placeholder="Indique su precio aquí" name="prices[]"
                                                        id="input{{ $book->ISBN }}" required="required" disabled>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <a href="/books/{{$book->ISBN}}" class="fw-bold mb-1 text-decoration-none" target="_blank">
                                                {{ $book->name }}
                                            </a>
                                        </td>
                                        <td>{{ $book->publisher }}</td>
                                        <td>{{ date('d-m-Y', strtotime($book->published_at)) }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-primary float-end">Guardar librería</button>
                            <form action="/bookshops/{{ $bookshop->id }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro que deseas eliminar esta librería?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger ">Eliminar</button>
                            </form>
                            <button type="button" class="btn btn-outline-secondary float-end me-2">
                                <a href="/bookshops/{{$bookshop->id}}">Cancelar</a>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@section('table_name', 'books-table')
@endsection

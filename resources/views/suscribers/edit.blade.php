@extends('layouts.template')

@section('title', 'Editar Suscriptor')

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
                <h3 class="fw-normal text-secondary fs-4 text-uppercase mb-4">Editar suscriptor</h3>
            </div>
            <form action="/suscriber/{{$suscriber->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-12">
                        <input type="email" class="form-control" placeholder="email" name="email" required="required"
                        value="{{$suscriber->email}}">
                    </div>
                    <table class="table align-middle table-striped display nowrap" cellspacing="0" id="books-table" width=100%>
                        <thead class="bg-light text-center">
                            <tr>
                                <th>Imagen</th>
                                <th>ISBN</th>
                                <th>Nombre</th>
                                <th>Editorial</th>
                                <th>Fecha de publicación</th>
                                <th>Categoría</th>
                                <th>Total de páginas</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($books as $book)
                                <tr class="text-center">
                                    <td>
                                        <img src="{{$book->image_link}}"
                                        alt="imagen del libro {{$book->name}}"
                                        class="img-thumbnail img-responsive book-img">
                                    </td>
                                    <td>{{$book->ISBN}} <br>
                                            <div class="custom-control custom-checkbox">
                                                @if ($suscriber->books->contains($book))
                                                <input type="checkbox" class="custom-control-input" id="customCheck1" name="books[]" value="{{$book->ISBN}}" checked>
                                                @else
                                                <input type="checkbox" class="custom-control-input" id="customCheck2" name="books[]" value="{{$book->ISBN}}">
                                                @endif
                                            </div>
                                    </td>
                                    <td>
                                        <a href="/book/{{$book->ISBN}}" class ="fw-bold mb-1 text-decoration-none">
                                            {{$book->name}}
                                        </a>
                                    </td>
                                    <td>{{$book->publisher}}</td>
                                    <td>{{date('d-m-Y', strtotime($book->published_at))}}</td>
                                    <td>{{$book->category}}</td>
                                    <td>{{$book->total_pages}}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="col-12 mt-5">
                        <button type="submit" class="btn btn-primary float-end">Guardar suscriptor</button>
                        <button type="button" class="btn btn-outline-secondary float-end me-2">
                            <a href="/suscribers">Cancelar</a>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@section('table_name', 'books-table')
@endsection

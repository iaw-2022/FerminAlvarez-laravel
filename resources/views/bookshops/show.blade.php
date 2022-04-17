@extends('layouts.template')

@section('title', 'Librería')

@section('content')
    <div class="card text-center ">
        <div class="card-body ">
            <h2 class="card-title">{{ $bookshop->name }}</h2>
            <h3 class="card-subtitle">Código: {{ $bookshop->id }}</h3>
            <p class="card-text">{{ $bookshop->city }} <br>
                Longitud: {{ $bookshop->latitude }} <br>
                Latitud: {{ $bookshop->longitude }}</p>
            <a href="/bookshop/{{ $bookshop->id }}/edit" class="btn btn-outline-primary my-3">Editar</a>
        </div>
    </div>
    <div class="row">
        <div class="aligns-items-center mt-3 col-lg-12">
            <table class="table align-middle table-striped display nowrap" cellspacing="0" id="books-table" width=100%>
                <thead class="bg-light text-center">
                    <tr>
                        <th>Imagen</th>
                        <th>ISBN</th>
                        <th>Nombre</th>
                        <th>Editorial</th>
                        <th>Precio</th>
                        <th>Fecha de publicación</th>
                        <th>Autor/es</th>
                        <th>Categoría</th>
                        <th>Total de páginas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookshop->books as $book)
                        <tr class="text-center">
                            <td>
                                <img src="{{ $book->image_link }}" alt="imagen del libro {{ $book->name }}"
                                    class="img-thumbnail img-responsive book-img">
                            </td>
                            <td>{{ $book->ISBN }}</td>
                            <td>
                                <a href="/book/{{ $book->ISBN }}" class="fw-bold mb-1 text-decoration-none">
                                    {{ $book->name }}
                                </a>
                            </td>
                            <td>{{ $book->publisher }}</td>
                            <td class="fw-bold" style="color:green">@money($book->pivot->price)</td>
                            <td>{{ date('d-m-Y', strtotime($book->published_at)) }}</td>
                            <td>
                                @foreach ($book->authors as $author)
                                    <a href="/author/{{ $author->id }}" class="fw-bold mb-1 text-decoration-none">
                                        {{ $author->name }}
                                    </a>
                                    <br>
                                @endforeach
                            </td>
                            <td>{{ $book->category }}</td>
                            <td>{{ $book->total_pages }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@section('table_name', 'books-table')
@endsection

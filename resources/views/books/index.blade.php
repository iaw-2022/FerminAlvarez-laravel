@extends('layouts.template')

@section('title', 'Libros')

@section('content')
    @if(Auth::user()->hasRole()=="admin")
        <div class="title-container d-flex justify-content-between">
            <h2 class="card-title">Libros</h2>
            <button class="btn btn-primary ml-4">
                <a href="/books/create" class="text-light">Nuevo Libro</a>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="aligns-items-center mt-3 col-lg-12 shadow-lg p-3 mb-5 bg-body rounded">
            <table class="table align-middle table-striped display nowrap" cellspacing="0" id="books-table" width=100%>
                <thead class="bg-light text-center">
                    <tr>
                        <th>Imagen</th>
                        <th>ISBN</th>
                        <th>Nombre</th>
                        <th>Editorial</th>
                        <th>Total de páginas</th>
                        <th>Fecha de publicación</th>
                        <th>Autor/es</th>
                        <th>Categoría</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr class="text-center">
                            <td>
                                <img src="{{ $book->image_link }}" alt="imagen del libro {{ $book->name }}"
                                    class="img-thumbnail img-responsive book-img">
                            </td>
                            <td>{{ $book->ISBN }}</td>
                            <td>
                                <a href="/books/{{ $book->ISBN }}" class="fw-bold mb-1 text-decoration-none">
                                    {{ $book->name }}
                                </a>
                            </td>
                            <td>{{ $book->publisher }}</td>
                            <td>{{ $book->total_pages }}</td>
                            <td>{{ date('d-m-Y', strtotime($book->published_at)) }} </td>
                            <td>
                                @foreach ($book->authors as $author)
                                    <a href="/authors/{{ $author->id }}" class="fw-bold mb-1 text-decoration-none">
                                        {{ $author->name }}
                                    </a>
                                    <br>
                                @endforeach
                            </td>
                            <td>
                                <a href="/categories/{{ $book->category()->first()->id }}" class="fw-bold mb-1 text-decoration-none">
                                {{ $book->category()->first()->name }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@section('table_name', 'books-table')
@endsection

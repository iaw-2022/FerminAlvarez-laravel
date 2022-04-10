@extends('layouts.template')

@section('title', 'Libros')

@section('content')
    <div class="row">
        <div class="aligns-items-center mt-3 col-lg-12">
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
                                    <img src="{{$book->image_link}}"
                                    alt="imagen del libro {{$book->name}}"
                                    class="img-thumbnail img-responsive book-img">
                                </td>
                                <td>{{$book->ISBN}}</td>
                                <td class ="fw-bold mb-1">{{$book->name}}</td>
                                <td>{{$book->publisher}}</td>
                                <td>{{$book->total_pages}}</td>
                                <td>{{$book->published_at}}</td>
                                <td>
                                    @foreach ($book->authors as $author)
                                        {{$author->name}}
                                        <br>
                                    @endforeach
                                </td>
                                <td>{{$book->category}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>

    @section('js')
        <script>$(document).ready(function() {
            $('#books-table').DataTable({
                responsive:true
            });});
        </script>
    @endsection
@endsection

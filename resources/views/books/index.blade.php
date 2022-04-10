@extends('layouts.template')
@section('css')
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Boostrap Datatables -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- Datatables responsive -->
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css" rel="stylesheet">
    <!-- Google Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/styles.css" rel="stylesheet">
@endsection

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
        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- JQuery datatables -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
        <!-- Datatables responsive datatables -->
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>

        <script>$(document).ready(function() {
            $('#books-table').DataTable({
                responsive:true
            });});
        </script>
    @endsection
@endsection

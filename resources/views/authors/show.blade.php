@extends('layouts.template')

@section('title', 'Autores')

@section('content')

    <div class="card text-center ">
    <div class="card-body ">
        <h2 class="card-title">{{$author->name}}</h2>
        <h3 class="card-subtitle">Código: {{$author->id}}</h3>
        {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
        </div>
    </div>

    <div class="row">
        <div class="aligns-items-center mt-3 col-lg-12">
            <table class="table align-middle table-striped display nowrap" cellspacing="0" id="authors-table" width=100%>
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
                    @foreach ($author->books as $book)
                        <tr class="text-center">
                            <td>
                                <img src="{{$book->image_link}}"
                                alt="imagen del libro {{$book->name}}"
                                class="img-thumbnail img-responsive book-img">
                            </td>
                            <td>{{$book->ISBN}}</td>
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
        </div>
    </div>

    @section('table_name', 'authors-table')
@endsection

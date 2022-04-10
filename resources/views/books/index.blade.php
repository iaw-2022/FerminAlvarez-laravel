@extends('layouts.template')

@section('content')
<div class="table-container table-responsive-xxl d-flex aligns-items-center mt-3">
    <table class="table align-middle mb-0 table-striped ">
        <thead class="bg-light text-center">
            <tr>
                <th>Imagen</th>
                <th>ISBN</th>
                <th>Nombre</th>
                <th>Editorial</th>
                <th>Total de páginas</th>
                <th>Fecha de publicación</th>
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
                    <td>{{$book->category}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

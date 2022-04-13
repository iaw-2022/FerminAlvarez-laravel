@extends('layouts.template')

@section('title', 'Librerías')

@section('content')
<div class="card text-center ">
    <div class="card-body ">
        <h2 class="card-title">{{$suscriber->email}}</h2>
        {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suscriber->books as $book)
                        <tr class="text-center">
                            <td>
                                <img src="{{$book->image_link}}"
                                alt="imagen del libro {{$book->name}}"
                                class="img-thumbnail img-responsive book-img">
                            </td>
                            <td>{{$book->ISBN}}</td>
                            <td class ="fw-bold mb-1">{{$book->name}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @section('table_name', 'books-table')
@endsection

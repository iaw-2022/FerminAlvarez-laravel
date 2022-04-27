@extends('layouts.template')

@section('title', 'Libro')

@section('content')
    <div class="card text-center ">
        <div class="card-body ">
            <img src="{{$book->image_link}}" alt="imagen del libro {{$book->name}}"
            class="img-thumbnail img-responsive book-img">
            <h2 class="card-title">{{$book->name}}</h2>
            <h3 class="card-subtitle">{{$book->ISBN}}</h3>
            <h3 class="card-subtitle">{{$book->category()->first()->name}}</h3>
            <ul class="list-group list-group-flush">
                @foreach ($book->authors as $author)
                    <li class="list-group-item">{{$author->name}}</li>
                @endforeach
            </ul>
            @if(Auth::user()->hasRole()=="admin")
                <a href="/books/{{ $book->ISBN }}/edit" class="btn btn-outline-primary my-3">Editar</a>
                <form action="/books/{{ $book->ISBN }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro que deseas eliminar este libro?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger ">Eliminar</button>
                </form>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="aligns-items-center mt-3 col-lg-12">
            <table class="table align-middle table-striped display nowrap" cellspacing="0" id="bookshops-table" width=100%>
                <thead class="bg-light text-center">
                    <tr>
                        <th>Librería</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($book->bookshops as $bookshop)
                        <tr class="text-center">
                            <td>
                                <a href="/bookshops/{{ $bookshop->id }}" class="fw-bold mb-1 text-decoration-none">
                                    {{ $bookshop->name }}
                                </a>
                            </td>
                            <td class="fw-bold" style="color:green">@money($bookshop->pivot->price)</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@section('table_name', 'bookshops-table')
@endsection

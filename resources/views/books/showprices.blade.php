@extends('layouts.template')

@section('title', 'Libros')

@section('content')

    <div class="card text-center ">
        <div class="card-body ">
            <img src="{{$book->image_link}}" alt="imagen del libro {{$book->name}}"
            class="img-thumbnail img-responsive book-img">
            <h2 class="card-title">{{$book->name}}</h2>
            <h3 class="card-subtitle">{{$book->ISBN}}</h3>
            {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
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
                            <td class ="fw-bold mb-1">{{$bookshop->name}}</td>
                            <td class="fw-bold" style="color:green">{{$bookshop->pivot->price}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @section('js')
        <script>$(document).ready(function() {
            $('#bookshops-table').DataTable({
                responsive:true
            });});
        </script>
    @endsection
@endsection

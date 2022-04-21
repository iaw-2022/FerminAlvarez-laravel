@extends('layouts.template')

@section('title', 'Libro')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger text-center">
            {{ $error }}
        </div>
        <div class="col-md-12 text-center">
            <button type="button" class="btn btn-outline-secondary">
                <a href="/bookshops/{{$bookshopID}}">Volver</a>
            </button>
        </div>
    @else
    <div class="card text-center ">
        <div class="card-body ">
            <img src="{{$book->image_link}}" alt="imagen del libro {{$book->name}}"
            class="img-thumbnail img-responsive book-img">
            <h2 class="card-title">{{$book->name}}</h2>
            <h3 class="card-subtitle">{{$book->ISBN}}</h3>
            <p class="fw-bold">
                Precio actual en el sistema: <span style="color:green">{{$book->pivot->price}}</span>
                <br>
                <span>Precio en el sitio web: <span style="color:green">{{$onlinePrice['Precio']}}</span>
                <br>
                <a href="{{$onlinePrice['Link']}}" class="fw-bold mb-1 text-decoration-none" target="_blank">
                    Enlace al libro de la tienda.
                </a>
                <form action="/bookshop/{{$bookshopID}}/book/{{$book->ISBN}}/update" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="price" value="{{$onlinePrice['Precio']}}">
                    <button type="button" class="btn btn-outline-secondary float-end me-2">
                        <a href="/bookshops/{{$bookshopID}}">Cancelar</a>
                    </button>
                </form>
            </p>
        </div>
    </div>
    @endif


@endsection

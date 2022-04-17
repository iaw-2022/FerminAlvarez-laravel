@extends('layouts.template')

@section('title', 'Librerías')

@section('content')
    <div class="title-container d-flex justify-content-between">
        <h2 class="card-title">Librerías</h2>
        <button class="btn btn-primary ml-4">
            <a href="/bookshops/create" class="text-light">Nueva Librería</a>
        </button>
    </div>
    <div class="row">
        <div class="aligns-items-center mt-3 col-lg-12 shadow-lg p-3 mb-5 bg-body rounded">
            <table class="table align-middle table-striped display nowrap" cellspacing="0" id="bookshops-table" width=100%>
                <thead class="bg-light text-center">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Ciudad</th>
                        <th>Latitud</th>
                        <th>Longitud</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookshops as $bookshop)
                        <tr class="text-center">
                            <td>{{ $bookshop->id }}</td>
                            <td>
                                <a href="/bookshops/{{ $bookshop->id }}" class="fw-bold mb-1 text-decoration-none">
                                    {{ $bookshop->name }}
                                </a>
                            </td>
                            <td>{{ $bookshop->city }}</td>
                            <td>{{ $bookshop->latitude }}</td>
                            <td>{{ $bookshop->longitude }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@section('table_name', 'bookshops-table')
@endsection

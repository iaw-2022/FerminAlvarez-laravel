@extends('layouts.template')
@section('title', 'Librerías')
@section('content')
<div class="table-container table-responsive-xxl d-flex aligns-items-center mt-3">
    <table class="table align-middle mb-0 table-striped ">
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
                    <td>{{$bookshop->id}}</td>
                    <td class ="fw-bold mb-1">{{$bookshop->name}}</td>
                    <td>{{$bookshop->city}}</td>
                    <td>{{$bookshop->latitude}}</td>
                    <td>{{$bookshop->longitude}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

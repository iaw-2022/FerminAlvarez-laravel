@extends('layouts.template')

@section('title', 'Librerías')

@section('content')
    <div class="row">
        <div class="aligns-items-center mt-3 col-lg-12">
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
    </div>

    @section('js')
        <script>$(document).ready(function() {
            $('#bookshops-table').DataTable({
                responsive:true
            });});
        </script>
    @endsection
@endsection

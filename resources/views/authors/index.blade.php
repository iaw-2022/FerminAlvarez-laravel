@extends('layouts.template')

@section('css')

@endsection

@section('title', 'Autores')
@section('content')
    <div class="row">
        <div class="aligns-items-center mt-3 col-lg-12">
            <table class="table align-middle table-striped display nowrap" cellspacing="0" id="authors-table" width=100%>
                <thead class="bg-light text-center">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($authors as $author)
                        <tr class="text-center">
                            <td>{{$author->id}}</td>
                            <td class ="fw-bold mb-1">{{$author->name}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @section('js')
        <script>$(document).ready(function() {
            $('#authors-table').DataTable({
                responsive:true
            });});
        </script>
    @endsection
@endsection

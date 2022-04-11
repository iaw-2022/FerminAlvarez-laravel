@extends('layouts.template')

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
                            <td>
                                <a href="/author/{{$author->id}}" class ="fw-bold mb-1 text-decoration-none">
                                    {{$author->name}}
                                </a>
                            </td> 
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

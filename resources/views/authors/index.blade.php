@extends('layouts.template')

@section('content')
<div class="table-container table-responsive-xxl d-flex aligns-items-center mt-3">
    <table class="table align-middle mb-0 table-striped ">
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
@endsection

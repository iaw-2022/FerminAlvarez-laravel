@extends('layouts.template')

@section('title', 'Categorías')

@section('content')
    @if(Auth::user()->hasRole()=="admin")
    <div class="title-container d-flex justify-content-between">
        <h2 class="card-title">Categorías</h2>
        <button class="btn btn-primary ml-4">
            <a href="/categories/create" class="text-light">Nueva Categoría</a>
        </button>
    </div>
    @endif
    <div class="row">
        <div class="aligns-items-center mt-3 col-lg-12 shadow-lg p-3 mb-5 bg-body rounded">
            <table class="table align-middle table-striped display nowrap" cellspacing="0" id="category-table" width=100%>
                <thead class="bg-light text-center">
                    <tr>
                        <th>Categoría</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="text-center">
                            <td>
                                <a href="/categories/{{ $category->id }}" class="fw-bold mb-1 text-decoration-none">
                                    {{ $category->name }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@section('table_name', 'category-table')
@endsection

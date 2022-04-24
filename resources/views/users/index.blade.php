@extends('layouts.template')

@section('title', 'Usuarios')

@section('content')
    <div class="title-container d-flex justify-content-between">
        <h2 class="card-title">Usuarios</h2>
        <button class="btn btn-primary ml-4">
            <a href="/users/create" class="text-light">Nuevo Usuario</a>
        </button>
    </div>
    <div class="row">
        <div class="aligns-items-center mt-3 col-lg-12 shadow-lg p-3 mb-5 bg-body rounded">
            <table class="table align-middle table-striped display nowrap" cellspacing="0" id="users-table" width=100%>
                <thead class="bg-light text-center">
                    <tr>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Rol</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="text-center">
                            <td>{{ $user->name }}</td>
                            <td>
                                <a href="/users/{{ $user->id }}/edit" class="fw-bold mb-1 text-decoration-none">
                                    {{ $user->email }}
                                </a>
                            </td>
                            <td>
                                {{ $user->hasRole() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@section('table_name', 'users-table')
@endsection

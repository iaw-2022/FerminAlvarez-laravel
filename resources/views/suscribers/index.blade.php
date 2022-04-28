@extends('layouts.template')

@section('title', 'Suscriptores')

@section('content')
    <div class="title-container d-flex justify-content-between">
        <h2 class="card-title">Suscriptores</h2>
        <button class="btn btn-primary ml-4">
            <a href="/suscribers/create" class="text-light">Nuevo Suscriptor</a>
        </button>
    </div>
    <div class="row">
        <div class="aligns-items-center mt-3 col-lg-12 shadow-lg p-3 mb-5 bg-body rounded">
            <table class="table align-middle table-striped display nowrap" cellspacing="0" id="suscribers-table" width=100%>
                <thead class="bg-light text-center">
                    <tr>
                        <th>e-mail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suscribers as $suscriber)
                        <tr class="text-center">
                            <td>
                                <a href="/suscribers/{{ $suscriber->id }}" class="fw-bold mb-1 text-decoration-none">
                                    {{ $suscriber->email }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@section('table_name', 'suscribers-table')
@endsection

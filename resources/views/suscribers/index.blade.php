@extends('layouts.template')

@section('title', 'Librerías')

@section('content')
    <h2 class="card-title">Suscriptores</h2>
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
                                <a href="/suscriber/{{$suscriber->id}}" class ="fw-bold mb-1 text-decoration-none">
                                    {{$suscriber->email}}
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

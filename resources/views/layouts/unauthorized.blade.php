@extends('layouts.template')

@section('title', 'Permiso no autorizado')

@section('content')
    <div class="text-center">
        <div class="alert alert-danger" role="alert">
            Usted no tiene permisos para acceder a esta sección
        </div>
    </div>
@endsection

@extends('layouts.template_simple_creation')

@section('title', 'Editar Categoría')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3 border p-4 shadow bg-light">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-12">
                    <h3 class="fw-normal text-secondary fs-4 text-uppercase mb-4">Editar Autor</h3>
                </div>
                <form action="/categories/{{ $category->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Categoría" name="category" required
                            value="{{ $category->name }}">
                        </div>
                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-primary float-end" id="submit">Guardar Categoría</button>
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="{{$category->id}}">Eliminar</button>
                            <button type="button" class="btn btn-outline-secondary float-end me-2">
                                <a href="/categories">Cancelar</a>
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade text-dark" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Está seguro que desea eliminar la categoría {{$category->name}}?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <form id="deleteForm" data-bs-action="/categories/" action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">Eliminar</button>
                        </form>
                    </div>
                </div>
        </div>
    @section('js')
    <script>
            var deleteModal = document.getElementById('deleteModal')
            deleteModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget
                var id = button.getAttribute('data-bs-id')
                var deleteForm = deleteModal.querySelector('#deleteForm')
                var action = deleteForm.getAttribute("data-bs-action")
                deleteForm.setAttribute("action",action+id)
            })
    </script>
    @endsection
@endsection

@extends('layouts.template_simple_creation')

@section('title', 'Editar Usuario')

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
                <form action="/users/{{ $user->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Nombre" name="name" required
                            value="{{ $user->name }}">
                        </div>
                        <div class="col-md-12">
                            <input type="email" class="form-control" placeholder="email" name="email" required
                            value="{{ $user->email }}">
                        </div>
                        <div class="col-md-12">
                            <input name="password" class="form-control" id="password" type="password" onkeyup='check();'
                                placeholder="Contraseña" required/>
                        </div>
                        <div class="col-md-12">
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password"
                                onkeyup='check();' placeholder="Contraseña" required/>
                        </div>
                        <div class="col-md-12">
                            <span id='message'></span>
                        </div>
                        <div class="col-md-12 text-center">
                            <p>Seleccione el rol del usuario</p>
                            <select class="form-select mx-auto" style="width:50%;"  name="rol">
                                @foreach ($roles as $rol)
                                    @if($user->hasRole() === $rol->role)
                                        <option value={{ $rol->id }} selected>{{ $rol->role }} </option>
                                    @else
                                        <option value={{ $rol->id }} selected>{{ $rol->role }} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-primary float-end" id="submit">Guardar Usuario</button>
                            <button type="button"  class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="{{$user->id}}">Eliminar</button>
                            <button type="button" class="btn btn-outline-secondary float-end me-2">
                                <a href="/users">Cancelar</a>
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
                    ¿Está seguro que desea eliminar el usuario {{$user->email}}?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form id="deleteForm" data-bs-action="/users/" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@section('js')
    <script>
        const submit = document.getElementById('submit');
        submit.setAttribute("disabled","disabled");
        var check = function() {
            var password = document.getElementById('password').value;
            var confirm_password = document.getElementById('confirm_password').value;
            if (password == confirm_password) {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'Las contraseñas coinciden';
                submit.removeAttribute('disabled');
            } else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Las contraseñas no coinciden';
                submit.setAttribute("disabled","disabled");
            }
        }

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

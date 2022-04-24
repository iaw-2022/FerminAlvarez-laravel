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
                            <select class="form-select mx-auto" aria-label="Default select example" style="width:50%;"  name="rol">
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
                            <button type="submit" class="btn btn-outline-danger" form="deleteForm">Eliminar</button>
                            <button type="button" class="btn btn-outline-secondary float-end me-2">
                                <a href="/users">Cancelar</a>
                            </button>
                        </div>
                </form>
                <div class="col-12 mt-5">
                    <form action="/users/{{ $user->id }}" method="POST" class="d-inline" id="deleteForm"
                        onsubmit="return confirm('¿Estás seguro que deseas eliminar este autor?')">
                        @csrf
                        @method('DELETE')
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
    </script>
@endsection
@endsection

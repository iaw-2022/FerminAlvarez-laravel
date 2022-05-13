@extends('layouts.template')

@section('title', 'Libro')

@section('content')
    <div class="card text-center ">
        <div class="card-body ">
            <img src="{{$book->image_link}}" alt="imagen del libro {{$book->name}}"
            class="img-thumbnail img-responsive book-img">
            <h2 class="card-title">{{$book->name}}</h2>
            <h3 class="card-subtitle">{{$book->ISBN}}</h3>
            <h3 class="card-subtitle">{{$book->category()->first()->name}}</h3>
            <ul class="list-group list-group-flush">
                @foreach ($book->authors as $author)
                    <li class="list-group-item">{{$author->name}}</li>
                @endforeach
            </ul>
            @if(Auth::user()->hasRole()=="admin")
                <a href="/books/{{ $book->ISBN }}/edit" class="btn btn-outline-primary my-3">Editar</a>
                <button type="submit" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="{{$book->ISBN}}">Eliminar</button>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="aligns-items-center mt-3 col-lg-12">
            <table class="table align-middle table-striped display nowrap" cellspacing="0" id="bookshops-table" width=100%>
                <thead class="bg-light text-center">
                    <tr>
                        <th>Librería</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($book->bookshops as $bookshop)
                        <tr class="text-center">
                            <td>
                                <a href="/bookshops/{{ $bookshop->id }}" class="fw-bold mb-1 text-decoration-none">
                                    {{ $bookshop->name }}
                                </a>
                            </td>
                            <td class="fw-bold" style="color:green">@money($bookshop->pivot->price)</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
                    ¿Está seguro que desea eliminar el libro {{$book->name}}?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form id="deleteForm" data-bs-action="/books/" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@section('table_name', 'bookshops-table')
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

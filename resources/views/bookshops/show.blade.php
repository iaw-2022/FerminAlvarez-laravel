@extends('layouts.template')

@section('title', 'Librería')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card text-center ">
        <div class="card-body ">
            <h2 class="card-title">{{ $bookshop->name }}</h2>
            <p class="card-text">{{ $bookshop->city }} <br>
                Calle: {{ $bookshop->street }} <br>
                Número: {{ $bookshop->number }}</p>
                <a href="/bookshops/{{ $bookshop->id }}/edit" class="btn btn-outline-primary my-3">Editar</a>
            @if(Auth::user()->hasRole()=="admin")
                <form action="/bookshops/{{ $bookshop->id }}" method="POST" class="d-inline"
                    onsubmit="return confirm('¿Estás seguro que deseas eliminar esta librería?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger ">Eliminar</button>
                </form>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="aligns-items-center mt-3 col-lg-12">
            <table class="table align-middle table-striped display nowrap" cellspacing="0" id="books-table" width=100%>
                <thead class="bg-light text-center">
                    <tr>
                        <th>Imagen</th>
                        <th>ISBN</th>
                        <th>Nombre</th>
                        <th>Editorial</th>
                        <th>Precio</th>
                        <th>Fecha de publicación</th>
                        <th>Autor/es</th>
                        <th>Categoría</th>
                        <th>Total de páginas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookshop->books as $book)
                        <tr class="text-center">
                            <td>
                                <img src="{{ $book->image_link }}" alt="imagen del libro {{ $book->name }}"
                                    class="img-thumbnail img-responsive book-img">
                            </td>
                            <td>{{ $book->ISBN }}</td>
                            <td>
                                <a href="/books/{{ $book->ISBN }}" class="fw-bold mb-1 text-decoration-none">
                                    {{ $book->name }}
                                </a>
                            </td>
                            <td>{{ $book->publisher }}</td>
                            <td class="fw-bold" style="color:green">
                                @money($book->pivot->price)<br>
                                <a href="/bookshop/{{ $bookshop->id }}/book/{{ $book->ISBN }}"
                                    class="fw-bold mb-1 text-decoration-none">
                                    ACTUALIZAR PRECIO
                                </a>
                            </td>
                            <td>{{ date('d-m-Y', strtotime($book->published_at)) }}</td>
                            <td>
                                @foreach ($book->authors as $author)
                                    <a href="/authors/{{ $author->id }}" class="fw-bold mb-1 text-decoration-none">
                                        {{ $author->name }}
                                    </a>
                                    <br>
                                @endforeach
                            </td>
                            <td>
                                <a href="/categories/{{ $book->category()->first()->id }}" class="fw-bold mb-1 text-decoration-none">
                                    {{ $book->category()->first()->name }}
                                </a>
                            </td>
                            <td>{{ $book->total_pages }}</td>
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
                    ¿Está seguro que desea eliminar el autor {{$author->name}}?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form id="deleteForm" data-bs-action="/authors/" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@section('table_name', 'books-table')
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

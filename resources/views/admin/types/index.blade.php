@extends('layouts.app')

@section('content')
    <div class="container pt-5 pb-5">
        <h1 class="pb-3">Lista delle tipologie dei progetti</h1>
        {{-- Pulsante per inserire un nuovo progetto --}}
        <div class="pb-3 fst-italic">
            <a href="{{ route('admin.types.create') }}">
                <i class="fa-solid fa-plus fst-italic"></i>
                Aggiungi una nuova tipologia di progetti
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-types">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Colore associato</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type)
                        <tr>
                            <td>{{ ucfirst($type->name) }}</td>
                            <td>
                                {{ $type->description ? substr($type->description, 0, 50) : '' }}...
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <div class="my-types-badge" style="background-color: {{ $type->color }}">
                                        {{ $type->color }}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    {{-- Pulsante per visualizzare una tipologia --}}
                                    <a class="btn btn-outline-primary btn-icons me-2"
                                        href="{{ route('admin.types.show', ['type' => $type->id]) }}" role="button">
                                        <i class="fa-solid fa-expand"></i>
                                    </a>
                                    {{-- Pulsante per modificare una tipologia --}}
                                    <a class="btn btn-outline-primary btn-icons me-2"
                                        href="{{ route('admin.types.edit', ['type' => $type->id]) }}" role="button">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    {{-- Pulsante per eliminare una tipologia --}}
                                    <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST">
                                        @csrf()
                                        @method('delete')
                                        <button class="btn btn-outline-primary btn-icons">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

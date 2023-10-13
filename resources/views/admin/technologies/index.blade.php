@extends('layouts.app')

@section('content')
    <div class="container pt-5 pb-5">
        <h1 class="pb-3">Lista delle tecnologie utilizzate</h1>
        {{-- Pulsante per inserire un nuovo progetto --}}
        <div class="pb-3 fst-italic">
            <a href="{{ route('admin.technologies.create') }}">
                <i class="fa-solid fa-plus fst-italic"></i>
                Aggiungi una nuova tecnologia
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-types">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Icona</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($technologies as $technology)
                        <tr>
                            <td>{{ ucfirst($technology->name) }}</td>
                            <td>
                                {{ $technology->description ? substr($technology->description, 0, 50) : '' }}...
                            </td>
                            <td>
                                <img src="{{ asset('/storage/' . $technology->icon) }}" class="card-img-top my-card-icon"
                                    alt="{{ $technology->name }}">
                            </td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    {{-- Pulsante per visualizzare una tipologia --}}
                                    <a class="btn btn-outline-primary btn-icons me-2"
                                        href="{{ route('admin.technologies.show', ['technology' => $technology->id]) }}"
                                        role="button">
                                        <i class="fa-solid fa-expand"></i>
                                    </a>
                                    {{-- Pulsante per modificare una tipologia --}}
                                    <a class="btn btn-outline-primary btn-icons me-2"
                                        href="{{ route('admin.technologies.edit', ['technology' => $technology->id]) }}"
                                        role="button">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    {{-- Pulsante per eliminare una tipologia --}}
                                    <form action="{{ route('admin.technologies.destroy', $technology->id) }}"
                                        method="POST">
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

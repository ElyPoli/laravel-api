@extends('layouts.app')

@section('content')
    <div class="container pt-5 pb-5">
        <div class="my-border">
            <div class="my-types-badge">
                <p class="card-text">
                    {{ $type->name }}
                </p>
            </div>
            <div class="d-flex flex-wrap align-items-center pb-3">
                <h1 class="me-5">{{ ucfirst($type->name) }}</h1>
                {{-- Pulsante per modificare una tipologia --}}
                <a class="btn btn-outline-primary btn-icons me-2 mb-3"
                    href="{{ route('admin.types.edit', ['type' => $type->id]) }}" role="button">
                    <i class="fa-regular fa-pen-to-square"></i>
                </a>
                {{-- Pulsante per eliminare una tipologia --}}
                <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST" class="mb-3">
                    @csrf()
                    @method('delete')
                    <button class="btn btn-outline-primary btn-icons">
                        <i class="fa-regular fa-trash-can"></i>
                    </button>
                </form>
            </div>
            <div class="my-types-badge" style="background-color: {{ $type->color }}">
                {{ $type->color }}
            </div>
        </div>
    </div>
@endsection

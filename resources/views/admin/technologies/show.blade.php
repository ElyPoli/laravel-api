@extends('layouts.app')

@section('content')
    <div class="container pt-5 pb-5">
        <div class="my-border">
            <div class="my-types-badge">
                <p class="card-text">
                    {{ ucfirst($technology->name) }}
                </p>
            </div>
            <div class="d-flex flex-wrap align-items-center pb-3">
                <h1 class="me-5">{{ ucfirst($technology->name) }}</h1>
                {{-- Pulsante per modificare una tipologia --}}
                <a class="btn btn-outline-primary btn-icons me-2 mb-3"
                    href="{{ route('admin.technologies.edit', ['technology' => $technology->id]) }}" role="button">
                    <i class="fa-regular fa-pen-to-square"></i>
                </a>
                {{-- Pulsante per eliminare una tipologia --}}
                <form action="{{ route('admin.technologies.destroy', $technology->id) }}" method="POST" class="mb-3">
                    @csrf()
                    @method('delete')
                    <button class="btn btn-outline-primary btn-icons">
                        <i class="fa-regular fa-trash-can"></i>
                    </button>
                </form>
            </div>
            <p>{{ $technology->description ? $technology->description : '' }}</p>
            <img src="{{ asset('/storage/' . $technology->icon) }}" class="technology-icon"
                alt="{{ $technology->name }}">
        </div>
    </div>
@endsection

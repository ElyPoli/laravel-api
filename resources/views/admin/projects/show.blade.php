@extends('layouts.app')

@section('content')
    <div class="container pt-5 pb-5">
        <div class="my-border">
            <div class="row row-cols-1 row-cols-md-2 gy-2 align-items-center">
                <div class="col">
                    <div class="d-flex flex-wrap align-items-center pb-3">
                        <h1 class="me-5">{{ ucfirst($project->title) }}</h1>
                        {{-- Pulsante per modificare un progetto --}}
                        <a class="btn btn-outline-primary btn-icons me-2 mb-3"
                            href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}" role="button">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                        {{-- Pulsante per eliminare un progetto --}}
                        <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST" class="mb-3">
                            @csrf()
                            @method('delete')
                            <button class="btn btn-outline-primary btn-icons">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                    <p>{{ $project->description ? $project->description : '' }}</p>
                    <p class="fst-italic mb-0">
                        Strumenti utilizzati:
                    </p>
                    <ul>
                        @foreach ($project['tools_used'] as $tool)
                            <li>{{ $tool }}</li>
                        @endforeach
                    </ul>
                    <div class="my-types-badge mb-2" style="background-color: {{ $project->type?->color }}">
                        <p class="card-text">
                            {{ $project->type?->name }}
                        </p>
                    </div>
                    <p>
                        <a href="{{ $project->repository_link }}">Guarda il codice nella repository</a>
                    </p>
                    <p>
                        <a href="{{ $project->url }}">Guarda il sito online</a>
                    </p>
                </div>
                <div class="col">
                    <img src="{{ asset('/storage/' . $project->thumbnail) }}" class="w-100 rounded-5 img-border"
                        alt="{{ $project->title }}">
                </div>
            </div>
        </div>
    </div>
@endsection

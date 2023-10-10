@extends('layouts.app')

@section('content')
    <div class="container pt-5 pb-5">
        <h1 class="pb-3">Lista dei progetti</h1>
        {{-- Pulsante per inserire un nuovo progetto --}}
        <div class="pb-3 fst-italic">
            <a href="{{ route('admin.projects.create') }}">
                <i class="fa-solid fa-plus fst-italic"></i>
                Aggiungi un nuovo progetto
            </a>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 gy-3">
            @foreach ($projects as $project)
                <div class="col">
                    <div class="card admin-projects-card">
                        <img src="{{ asset('/storage/' . $project->thumbnail) }}" class="card-img-top"
                            alt="{{ $project->title }}">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title">{{ ucfirst($project->title) }}</h5>
                            <p class="card-text">{{ $project->description ? substr($project->description, 0, 100) : '' }}...
                            </p>
                            <p class="card-text fst-italic mb-0">
                                Strumenti utilizzati:
                            </p>
                            <ul>
                                @foreach ($project['tools_used'] as $tool)
                                    <li>{{ $tool }}</li>
                                @endforeach
                            </ul>
                            <p class="card-text">
                                <a href="{{ $project->repository_link }}">Guarda la repository</a>
                            </p>
                            <div class="d-flex justify-content-center align-items-center">
                                {{-- Pulsante per visualizzare un progetto --}}
                                <a class="btn btn-outline-primary btn-icons me-2"
                                    href="{{ route('admin.projects.show', ['project' => $project->slug]) }}" role="button">
                                    <i class="fa-solid fa-expand"></i>
                                </a>
                                {{-- Pulsante per modificare un progetto --}}
                                <a class="btn btn-outline-primary btn-icons me-2"
                                    href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}" role="button">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                {{-- Pulsante per eliminare un progetto --}}
                                <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                                    @csrf()
                                    @method('delete')
                                    <button class="btn btn-outline-primary btn-icons">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container pt-5 pb-5">
        <h1 class="pb-5">{{ $project->title }}</h1>
        {{-- Pulsante per modificare un progetto --}}
        <a class="btn btn-outline-primary" href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}"
            role="button">
            <i class="fa-regular fa-pen-to-square"></i>
        </a>
        {{-- Pulsante per eliminare un progetto --}}
        <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
            @csrf()
            @method('delete')
            <button class="btn btn-outline-primary">
                <i class="fa-regular fa-trash-can"></i>
            </button>
        </form>
        <p>{{ $project->description ? $project->description : '' }}</p>
        <p>
            <span>Strumenti e tecnologie utilizzate:</span>
        <ul>
            @foreach ($project['tools_used'] as $tool)
                <li>{{ $tool }}</li>
            @endforeach
        </ul>
        </p>
        <p>
            <span>Link alla repository:</span>
            <a href="{{ $project->repository_link }}">{{ $project->repository_link }}</a>
        </p>
        <p>
            <span>Url:</span>
            <a href="{{ $project->url }}">{{ $project->url }}</a>
        </p>
    </div>
@endsection

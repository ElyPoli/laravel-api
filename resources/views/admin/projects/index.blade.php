@extends('layouts.app')

@section('content')
    <div class="container pt-5 pb-5">
        <h1 class="pb-5">Lista dei progetti</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Titolo</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Strumenti utilizzati</th>
                    <th scope="col">Repository</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->description ? substr($project->description, 0, 20) : '' }}...</td>
                        <td>
                            <ul>
                                @foreach ($project['tools_used'] as $tool)
                                    <li>{{ $tool }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <a href=""{{ $project->repository_link }}>{{ $project->repository_link }}</a>
                        </td>
                        <td>
                            {{-- Pulsante per visualizzare un progetto --}}
                            <a class="btn btn-outline-primary"
                                href="{{ route('admin.projects.show', ['project' => $project->slug]) }}" role="button">
                                <i class="fa-solid fa-expand"></i>
                            </a>
                            {{-- Pulsante per modificare un progetto --}}
                            <a class="btn btn-outline-primary"
                                href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}" role="button">
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
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- Pulsante per inserire un nuovo progetto --}}
        <a class="btn btn-outline-primary" href="{{ route('admin.projects.create') }}" role="button">
            <i class="fa-solid fa-plus"></i> Aggiungi un nuovo progetto
        </a>
    </div>
@endsection

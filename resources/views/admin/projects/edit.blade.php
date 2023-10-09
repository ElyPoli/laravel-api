@extends('layouts.app')

@section('content')
    <div class="container pt-5 pb-5">
        <h1 class="pb-3">Modifica il progetto</h1>

        {{-- Includo il form per modificare il progetto  --}}
        @include('admin.projects.forms.upsert', [
            'action' => route('admin.projects.update', $project->slug),
            'method' => 'PUT',
            'project' => $project,
        ])

    </div>
@endsection

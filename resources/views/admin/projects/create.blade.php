@extends('layouts.app')

@section('content')
    <div class="container pt-5 pb-5">
        <h1 class="pb-5">Inserisci un nuovo progetto</h1>

        {{-- Includo il form per inserire un nuovo progetto  --}}
        @include('admin.projects.forms.upsert', [
            'action' => route('admin.projects.store'),
            'method' => 'POST',
            'project' => null,
        ])

    </div>
@endsection

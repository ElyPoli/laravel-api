@extends('layouts.app')

@section('content')
    <div class="container pt-5 pb-5">
        <h1 class="pb-3">Modifica una tecnologia</h1>

        {{-- Includo il form per modificare una tecnologia  --}}
        @include('admin.technologies.forms.upsert', [
            'action' => route('admin.technologies.update', $technology->id),
            'method' => 'PUT',
            'technology' => $technology,
        ])

    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container pt-5 pb-5">
        <h1 class="pb-3">Inserisci una nuova tecnologia</h1>

        {{-- Includo il form per inserire una nuova tecnologia  --}}
        @include('admin.technologies.forms.upsert', [
            'action' => route('admin.technologies.store'),
            'method' => 'POST',
            'technology' => null,
        ])

    </div>
@endsection

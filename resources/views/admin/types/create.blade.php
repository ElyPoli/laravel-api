@extends('layouts.app')

@section('content')
    <div class="container pt-5 pb-5">
        <h1 class="pb-3">Inserisci una nuova tipologia di progetto</h1>

        {{-- Includo il form per inserire una nuova tipologia di progetto  --}}
        @include('admin.types.forms.upsert', [
            'action' => route('admin.types.store'),
            'method' => 'POST',
            'type' => null,
        ])

    </div>
@endsection

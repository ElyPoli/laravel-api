@extends('layouts.app')

@section('content')
    <div class="container pt-5 pb-5">
        <h1 class="pb-3">Modifica una tipologia di progetto</h1>

        {{-- Includo il form per modificare una tipologia di progetto  --}}
        @include('admin.types.forms.upsert', [
            'action' => route('admin.types.update', $type->id),
            'method' => 'PUT',
            'type' => $type,
        ])

    </div>
@endsection

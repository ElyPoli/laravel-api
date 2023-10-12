<form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="my-border">
    @csrf()
    @method($method)
    <div class="mb-3">
        {{-- nome --}}
        <label class="form-label fw-bold">Nome della tipologia:</label>
        <input type="text" name="name" value="{{ old('name', $type?->name) }}"
            class="form-control @error('name') is-invalid @enderror">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        {{-- descrizione --}}
        <label class="form-label fw-bold mt-2">Descrizione:</label>
        <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $type?->description) }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        {{-- colore --}}
        <label class="form-label fw-bold mt-2">Scegli un colore:</label>
        <input type="color" class="form-control form-control-color @error('color') is-invalid @enderror"
            name="color" value="{{ old('color', $type?->color) }}" title="Scegli un colore">
        @error('color')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        {{-- pulsanti --}}
        <button type="submit" class="btn btn-outline-primary me-1 mt-4">Save</button>
        <a href="{{ route('admin.types.index') }}" class="btn btn-outline-primary mt-4">Cancel</a>
    </div>
</form>

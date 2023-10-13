<form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="my-border">
    @csrf()
    @method($method)
    <div class="mb-3">
        {{-- nome --}}
        <label class="form-label fw-bold">Nome della tecnologia:</label>
        <input type="text" name="name" value="{{ old('name', $technology?->name) }}"
            class="form-control @error('name') is-invalid @enderror">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        {{-- descrizione --}}
        <label class="form-label fw-bold mt-2">Descrizione:</label>
        <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $technology?->description) }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        {{-- immagine --}}
        <div class="d-flex align-items-center mt-2">
            @if ($technology?->icon)
                <img class="old-img-project me-4 mt-2"
                    src="{{ old('icon', asset('/storage/' . $technology->icon)) }}"
                    alt="{{ old('name', $technology?->name) }}">
            @endif
            <div class="w-100">
                <label class="form-label fw-bold">Icona:</label>
                <input type="file" accept="image/*" name="icon"
                    class="form-control @error('icon') is-invalid @enderror">
                @error('icon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        {{-- pulsanti --}}
        <button type="submit" class="btn btn-outline-primary me-1 mt-4">Save</button>
        <a href="{{ route('admin.technologies.index') }}" class="btn btn-outline-primary mt-4">Cancel</a>
    </div>
</form>

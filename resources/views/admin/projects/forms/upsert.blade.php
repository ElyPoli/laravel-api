<form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="my-border">
    @csrf()
    @method($method)
    <div class="mb-3">
        {{-- titolo --}}
        <label class="form-label fw-bold">Titolo:</label>
        <input type="text" name="title" value="{{ old('title', $project?->title) }}"
            class="form-control @error('title') is-invalid @enderror">
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        {{-- descrizione --}}
        <label class="form-label fw-bold mt-2">Descrizione:</label>
        <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $project?->description) }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        {{-- immagine --}}
        <div class="d-flex align-items-center mt-2">
            @if ($project?->thumbnail)
                <img class="old-img-project img-border me-4 mt-2"
                    src="{{ old('thumbnail', asset('/storage/' . $project->thumbnail)) }}"
                    alt="{{ old('title', $project?->title) }}">
            @endif
            <div class="w-100">
                <label class="form-label fw-bold">Immagine:</label>
                <input type="file" accept="image/*" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror">
                @error('thumbnail')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        {{-- strumenti utilizzati --}}
        <div class="form-group">
            <label class="form-label fw-bold mt-2">Strumenti utilizzati:</label>
            <div class="d-flex flex-wrap">
                @foreach (['HTML', 'CSS', 'JavaScript', 'Vue.js', 'PHP', 'MySQL', 'Laravel'] as $tool)
                    <div class="form-check m-1">
                        <input class="form-check-input" type="checkbox" id="{{ $tool }}-select"
                            name="tools_used[]" value="{{ $tool }}"
                            {{ in_array($tool, old('tools_used', $project->tools_used ?? [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="{{ $tool }}-select">{{ $tool }}</label>
                    </div>
                @endforeach
                @error('tools_used')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
        </div>
        {{-- link repo --}}
        <label class="form-label fw-bold mt-2">Link repository:</label>
        <input type="url" name="repository_link" value="{{ old('repository_link', $project?->repository_link) }}"
            class="form-control @error('repository_link') is-invalid @enderror">
        @error('repository_link')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        {{-- url --}}
        <label class="form-label fw-bold mt-2">Url:</label>
        <input type="url" name="url" value="{{ old('url', $project?->url) }}"
            class="form-control @error('url') is-invalid @enderror">
        @error('url')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        </>
        {{-- pulsanti --}}
        <button type="submit" class="btn btn-outline-primary me-1 mt-4">Save</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-primary mt-4">Cancel</a>
</form>

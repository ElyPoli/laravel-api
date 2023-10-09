<form action="{{ $action }}" method="POST" class="my-border">
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
        {{-- strumenti utilizzati --}}
        <label class="form-label fw-bold mt-2">Strumenti utilizzati:</label>
        <input type="text" name="tools_used"
            value="{{ old('tools_used', implode(', ', $project?->tools_used ?? [])) }}"
            class="form-control @error('tools_used') is-invalid @enderror">
        @error('tools_used')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
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
    </div>
    {{-- pulsanti --}}
    <button type="submit" class="btn btn-outline-primary me-1">Save</button>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-primary">Cancel</a>
</form>

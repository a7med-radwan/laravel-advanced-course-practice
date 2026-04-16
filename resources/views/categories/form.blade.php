<div class="mb-3">
    <label class="">Name</label>
    <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" placeholder="Name"
        value="{{ old('name', $category->name) }}">
    @error('name')
        <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>

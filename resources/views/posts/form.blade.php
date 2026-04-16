<div class="mb-3">
    <label class="">Title</label>
    <input type="text" name="title" class="form-control @error('title')is-invalid @enderror" placeholder="Title"
        value="{{ old('title', $post->title) }}">
    @error('title')
        <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label class="">Image</label>
    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
    @error('image')
        <small class="invalid-feedback">{{ $message }}</small>
    @enderror
    <img src="{{ asset('uploads/' . $post->image) }}" width="80" alt="">
</div>

<div class="mb-3">
    <label class="">Body</label>
    <textarea name="body" id="mytextarea" class="form-control @error('body') is-invalid @enderror" placeholder="Body">{{ old('body', $post->body) }}</textarea>
    @error('body')
        <small class="invalid-feedback">{{ $message }}</small>
    @enderror
</div>

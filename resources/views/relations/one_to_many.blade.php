<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relations</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

</head>
<body>
    <div class="container my-5">
        <div class="text-center">
            <h1 class="mb-4">Post Title: {{ $post->title }}</h1>
            <img src="{{ $post->image }}" class="my-4" alt="">
            <p>{{ $post->body }}</p>
        </div>

        <hr>
        <h3 class="mb-4">Comments ({{ $post->comments->count() }})</h3>
        @forelse ($post->comments()->orderByDesc('id')->get()->load('user') as $comment)
            <div class="card-body">
                <h5 class="card-title">Comment by {{ $comment->user->name }}</h5>
                <p class="card-text">{{ $comment->comment }}</p>
                <hr>
            </div>
        @empty
            <p>No comments yet.</p>
        @endforelse


        <form action="{{ route('one_to_many_data') }}" method="POST">
            @csrf
            <label for="content">Add a comment:</label>
            <input type = "hidden" name="post_id" value="{{ $id }}">
            <textarea class="form-control mb-3" placeholder="Type your comment here..." name="comment" rows="3"></textarea>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</body>
</html>

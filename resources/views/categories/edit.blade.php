<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Categories</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
</head>

<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Edit Category : <span class="text-danger">{{ $category->name }}</span> </h1>
            {{-- <a href="{{ route('categories.index') }}" class="btn btn-dark w-25">All Categories</a> --}}
            <a onclick="history.back()" class="btn btn-dark w-25">Return Back</a>
        </div>

        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('categories.form')
            <button class="btn btn-info btn-lg w-25">Update</button>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
        })
    </script>
</body>

</html>

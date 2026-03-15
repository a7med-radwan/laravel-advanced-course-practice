<!DOCTYPE html>
<html lang="en">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Form 4</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <h1>Uplode your CV</h1>
        {{-- @include('forms.errors') --}}
        <form action="{{ route('form4_data') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control @error('name')is-invalid @enderror "
                    placeholder="Name">
                @error('name')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>CV</label>
                <input type="file" name="cv" accept=".pdf" class="form-control @error('cv')is-invalid @enderror">
                @error('cv')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-success px-5">Upload</button>

        </form>
    </div>

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Form 3</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <h1>Add New Post</h1>

        {{-- @dump($errors->any())
        @dump($errors->all()) --}}

        @include('forms.errors')

        <form action="{{ route('form3_data') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" placeholder="Title"
                    class="form-control @error('title') is-invalid @enderror " value="{{ old('title') }}">
                @error('title')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Body</label>
                <textarea name="body" id="mytextarea" maxlength="100" placeholder="Body" rows="5"
                    class="form-control @error('body') is-invalid @enderror">{{ old('body') }}</textarea>
                <span id="count">0</span>/100
                @error('body')
                    {{-- <small class="text-dnger">{{ $message }}</small> --}}
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-warning w-100">Add</button>
        </form>
    </div>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#mytextarea').on('input', function() {
                var count = $(this).val().length;
                if (count == 100) {
                    $('#count').css('color', 'red')
                }else{
                    $('#count').css('color', 'black')
                }
                $('#count').text(count);
            });
        });
    </script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.0/tinymce.min.js"
        integrity="sha512-dr3qAVHfaeyZQPiuN6yce1YuH7YGjtUXRFpYK8OfQgky36SUfTfN3+SFGoq5hv4hRXoXxAspdHw4ITsSG+Ud/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
            plugins: [
                'a11ychecker', 'accordion', 'advlist', 'anchor', 'autolink', 'autosave',
                'charmap', 'code', 'codesample', 'directionality', 'emoticons', 'exportpdf',
                'exportword', 'fullscreen', 'help', 'image', 'importcss', 'importword',
                'insertdatetime', 'link', 'lists', 'markdown', 'math', 'media', 'nonbreaking',
                'pagebreak', 'preview', 'quickbars', 'save', 'searchreplace', 'table',
                'visualblocks', 'visualchars', 'wordcount'
            ],
            toolbar: 'undo redo | accordion accordionremove | ' +
                'importword exportword exportpdf | math | ' +
                'blocks fontfamily fontsize | bold italic underline strikethrough | ' +
                'align numlist bullist | link image | table media | ' +
                'lineheight outdent indent | forecolor backcolor removeformat | ' +
                'charmap emoticons | code fullscreen preview | save print | ' +
                'pagebreak anchor codesample | ltr rtl',
        })
    </script>

</body>

</html>

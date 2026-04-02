<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />

    <style>
        .table th,
        .table td {
            vertical-align: middle
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>All Posts</h1>
            <a href="{{ route('posts.create') }}" class="btn btn-dark w-25">Add New Post</a>
        </div>

        @if (session('msg'))
            <div class="alert alert-{{ session('type') }} alert-dismissible fade show">{{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>
        @endif

        <form action="{{ route('posts.index') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control w-50" placeholder="Search about anything.."
                    aria-label="Search about anything.." name="search" value="{{ request()->search }}"
                    aria-describedby="button-addon2">
                <select name="count" class="form-select w-25">
                    <option value="10" @selected(request()->count == 10)>10</option>
                    <option value="15" @selected(request()->count == 15)>15</option>
                    <option value="20"@selected(request()->count == '') @selected(request()->count == 20)>20</option>
                    <option value="25" @selected(request()->count == 25)>25</option>
                    <option value="all" @selected(request()->count == 'all')>All</option>
                </select>
                <button class="btn btn-dark" id="button-addon2">Search</button>
            </div>
        </form>
        <table class="table table-bordered table-hover table-striped">
            <tr class="table-dark">
                <th>Id</th>
                <th>Title</th>
                <th>Image</th>
                <th>Viewer</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>

            @forelse ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td><img src="{{ asset('uploads/' . $post->image) }}" width="80" alt=""></td>
                    <td>{{ $post->viewer }}</td>
                    <td>{{ $post->created_at->format('M d, Y') }}</td>
                    <td>{{ $post->updated_at->diffForHumans() }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary " href=""><i class="fas fa-edit"></i></a>
                        {{-- <a class="btn btn-sm btn-danger" href=""><i class="fas fa-trash"></i></a> --}}

                        <form class="d-inline" action="{{ route('posts.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Are you sure !?')" class="btn btn-sm btn-danger"><i
                                    class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No Data Found</td>
                </tr>
            @endforelse

            {{-- @if ($posts->count())
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->image }}</td>
                        <td>{{ $post->viewer }}</td>
                        <td>{{ $post->created_at->format('M d, Y') }}</td>
                        <td>{{ $post->updated_at->diffForHumans() }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary " href=""><i class="fas fa-edit"></i></a>
                            <a class="btn btn-sm btn-danger" href=""><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            @else
            <tr><td colspan="7" class="text-center">No Data Found</td></tr>
            @endif --}}
        </table>
        {{-- {{ $posts->appends(['search' => request()->search, 'count' => request()->count])->links() }} --}}
        {{ $posts->appends($_GET)->links() }}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session('msg'))
            Swal.fire({
                title: 'Success',
                text: '{{ session('msg') }}',
                icon: 'success',
                confirmButtonText: 'Done'
            })
        @endif
    </script>
    <script>
        setTimeout(() => {
            document.querySelector('.alert').remove();
        }, 3000);

        // setTimeout(() => {
        //     console.log('Timeout')
        // }, 3000);

        // setInterval(() => {
        //     console.log('Interval')
        // }, 3000);
    </script>

</body>

</html>

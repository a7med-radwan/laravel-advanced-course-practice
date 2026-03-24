<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
</head>

<body>
    <div class="container my-5">
        <h1>All Posts</h1>
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
        </table>
        {{-- {{ $posts->appends(['search' => request()->search, 'count' => request()->count])->links() }} --}}
        {{ $posts->appends($_GET)->links() }}
    </div>
</body>

</html>

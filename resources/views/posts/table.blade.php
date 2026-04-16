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
                        <a class="btn btn-sm btn-primary " href="{{ route('posts.edit', $post->id) }}"><i class="fas fa-edit"></i></a>
                        {{-- <a class="btn btn-sm btn-danger" href=""><i class="fas fa-trash"></i></a> --}}

                        <form class="d-inline" action="{{ route('posts.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('delete')
                            {{-- <button onclick="return confirm('Are you sure !?')" class="btn btn-sm btn-danger btn-del"><i
                                    class="fas fa-trash"></i></button> --}}
                            <button class="btn btn-sm btn-danger btn-del"><i class="fas fa-trash"></i></button>
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

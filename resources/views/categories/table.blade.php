    <table class="table table-bordered table-hover table-striped">
            <tr class="table-dark">
                <th>Id</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>

            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at->format('M d, Y') }}</td>
                    <td>{{ $category->updated_at->diffForHumans() }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary " href="{{ route('categories.edit', $category->id) }}"><i class="fas fa-edit"></i></a>
                        <form class="d-inline" action="{{ route('categories.destroy', $category->id) }}" method="category">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger btn-del"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No Data Found</td>
                </tr>
            @endforelse
        </table>
        {{ $categories->appends($_GET)->links() }}

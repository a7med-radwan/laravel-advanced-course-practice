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
        <h1>All Users</h1>
        <table class="table table-hover table-bordered">
            <tr class="table-dark">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Insurance Serial</th>
                <th>Insurance Expire</th>
            </tr>
            @foreach($users as $user)
            <tr>

                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->insurance->serial }}</td>
                <td>{{ $user->insurance->expire }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>

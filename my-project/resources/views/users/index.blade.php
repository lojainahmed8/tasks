<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>ALL Users</title>
</head>
<body>
    <h1 style="text-align: center;color:red"> All Users Page</h1>

    @if(session('success'))
        <div class="alert alert-success w-75 m-auto">{{ session('success') }}</div>
    @endif

    <div class="w-75 m-auto text-end mb-2">
        <a href="{{ route('users.create') }}"><button class="btn btn-success">Add User</button></a>
    </div>

    <table class="table table-striped w-75 m-auto">
        <thead>
            <th>id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('users.show', $user->id) }}"><button class="btn btn-warning">View</button></a>
                    <a href="{{ route('users.edit', $user->id) }}"><button class="btn btn-primary">Edit</button></a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="post" style="display:inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
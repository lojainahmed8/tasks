<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>All Categories</title>
</head>
<body>
    <h1 style="text-align: center;color:red">All Categories Page</h1>
    <table class="table table-striped w-75 m-auto">
        <thead>
            <th>id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href="{{ route('categories.show', $category->id) }}">
                        <button class="btn btn-warning">View</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> -->

<!-- ========day3============== -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>All Categories</title>
</head>
<body>
    <h1 style="text-align: center;color:red">All Categories Page</h1>

    @if(session('success'))
        <div class="alert alert-success w-75 m-auto">{{ session('success') }}</div>
    @endif

    <div class="w-75 m-auto text-end mb-2">
        <a href="{{ route('categories.create') }}"><button class="btn btn-success">Add Category</button></a>
    </div>

    <table class="table table-striped w-75 m-auto">
        <thead>
            <th>id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <a href="{{ route('categories.show', $category->id) }}"><button class="btn btn-warning">View</button></a>
                    <a href="{{ route('categories.edit', $category->id) }}"><button class="btn btn-primary">Edit</button></a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="post" style="display:inline">
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
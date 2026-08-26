<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Category</title>
</head>
<body>
    <h1 style="text-align: center;color:red">{{ $category->name }}</h1>
    <table class="table table-striped w-75 m-auto">
        <thead>
            <th>id</th>
            <th>Name</th>
            <th>Description</th>
        </thead>
        <tbody>
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
            </tr>
        </tbody>
    </table>
    <div class="text-center">
        <a href="{{ route('categories.index') }}"><button class="btn btn-success">Back</button></a>
    </div>
</body>
</html>
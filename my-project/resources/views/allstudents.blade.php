<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>ALL Students</title>
</head>
<body>
<h1 style="text-align: center;color:red"> All Students Page</h1>

<table class="table table-striped w-75 m-auto">
    <thead>
        <th>id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $student["id"] }}</td>
            <td>{{ $student["name"] }}</td>
            <td>{{ $student["email"] }}</td>
            <td>
                <a href="/student/{{ $student['id'] }}" class="btn btn-warning">View</a>
                <button class="btn btn-primary">Edit</button>
                <button class="btn btn-danger">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
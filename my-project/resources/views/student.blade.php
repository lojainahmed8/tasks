
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Student Details</title>
</head>
<body>

<h1 style="text-align:center; color:red;">Student Details</h1>

<div class="card w-50 m-auto">
    <div class="card-body">
        <h5 class="card-title">ID: {{ $student['id'] }}</h5>
        <p class="card-text">Name: {{ $student['name'] }}</p>
        <p class="card-text">Email: {{ $student['email'] }}</p>
        <a href="/students" class="btn btn-secondary">Back to all students</a>
    </div>
</div>

</body>
</html>
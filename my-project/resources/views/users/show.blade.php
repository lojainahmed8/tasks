<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>profile</title>
</head>
<body>

<h1 style="text-align: center;color:red"> {{ $user->name }} Page</h1>

<table class="table table-striped w-75 m-auto">
    <thead>
        <th>id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
    </thead>
    <tbody>
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('users.index') }}"><button class="btn btn-success">Back</button></a>
                <button class="btn btn-primary">Edit</button>
                <form action="{{ route('users.destroy', $user->id) }}" method="post" style="display:inline">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    </tbody>
</table>

<hr>

<h2 class="text-center text-success"> All Orders </h2>

<table class="table table-striped w-75 m-auto">
    <thead>
        <th>Order ID</th>
        <th>Created At</th>
        <th>Action</th>
    </thead>
    <tbody>
        @forelse($user->orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->created_at }}</td>
            <td>
                <a href="{{ route('orders.show', $order->id) }}">
                    <button class="btn btn-warning">View</button>
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center">No orders yet</td>
        </tr>
        @endforelse
    </tbody>
</table>

</body>
</html>
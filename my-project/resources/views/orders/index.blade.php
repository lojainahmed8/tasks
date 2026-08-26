<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>All Orders</title>
</head>
<body>
    <h1 style="text-align: center;color:red">All Orders Page</h1>

    @if(session('success'))
        <div class="alert alert-success w-75 m-auto">{{ session('success') }}</div>
    @endif

    <div class="w-75 m-auto text-end mb-2">
        <a href="{{ route('orders.create') }}"><button class="btn btn-success">Add Order</button></a>
    </div>

    <table class="table table-striped w-75 m-auto">
        <thead>
            <th>id</th>
            <th>User</th>
            <th>Created At</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>
                    <a href="{{ route('users.show', $order->user->id) }}">{{ $order->user->name }}</a>
                </td>
                <td>{{ $order->created_at }}</td>
                <td>
                    <a href="{{ route('orders.show', $order->id) }}"><button class="btn btn-warning">View</button></a>
                    <form action="{{ route('orders.destroy', $order->id) }}" method="post" style="display:inline">
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
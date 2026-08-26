<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Order</title>
</head>
<body>
    <h1 style="text-align: center;color:red">Order #{{ $order->id }}</h1>
    <table class="table table-striped w-75 m-auto">
        <thead>
            <th>id</th>
            <th>User ID</th>
            <th>Created At</th>
        </thead>
        <tbody>
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user_id }}</td>
                <td>{{ $order->created_at }}</td>
            </tr>
        </tbody>
    </table>
    <div class="text-center">
        <a href="{{ route('orders.index') }}"><button class="btn btn-success">Back</button></a>
    </div>
</body>
</html>

==============day3========== -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Order</title>
</head>
<body>
    <h1 style="text-align: center;color:red">Order #{{ $order->id }}</h1>

    <table class="table table-striped w-75 m-auto">
        <thead>
            <th>Order ID</th>
            <th>User</th>
            <th>Created At</th>
        </thead>
        <tbody>
            <tr>
                <td>{{ $order->id }}</td>
                <td>
                    <a href="{{ route('users.show', $order->user->id) }}">{{ $order->user->name }}</a>
                </td>
                <td>{{ $order->created_at }}</td>
            </tr>
        </tbody>
    </table>

    <h3 class="text-center">Products</h3>
    <table class="table table-striped w-75 m-auto">
        <thead>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
        </thead>
        <tbody>
            @foreach($order->orderItems as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="text-center">
        <a href="{{ route('orders.index') }}"><button class="btn btn-success">Back</button></a>
    </div>
</body>
</html>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Product</title>
</head>
<body>
    <h1 style="text-align: center;color:red">{{ $product->name }}</h1>
    <table class="table table-striped w-75 m-auto">
        <thead>
            <th>id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
        </thead>
        <tbody>
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
            </tr>
        </tbody>
    </table>
    <div class="text-center">
        <a href="{{ route('products.index') }}"><button class="btn btn-success">Back</button></a>
    </div>
</body>
</html>

==========task day 3======== -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Product</title>
</head>
<body>
    <h1 style="text-align: center;color:red">{{ $product->name }}</h1>
    <table class="table table-striped w-75 m-auto">
        <thead>
            <th>id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Category</th>
        </thead>
        <tbody>
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>
                    <a href="{{ route('categories.show', $product->category->id) }}">
                        {{ $product->category->name }}
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="text-center">
        <a href="{{ route('products.index') }}"><button class="btn btn-success">Back</button></a>
    </div>
</body>
</html>
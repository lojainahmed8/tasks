<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>All Products</title>
</head>
<body>
    <h1 style="text-align: center;color:red">All Products Page</h1>
    <table class="table table-striped w-75 m-auto">
        <thead>
            <th>id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}">
                        <button class="btn btn-warning">View</button>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> -->

<!-- 
==========task day3======== -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>All Products</title>
</head>
<body>
    <h1 style="text-align: center;color:red">All Products Page</h1>

    @if(session('success'))
        <div class="alert alert-success w-75 m-auto">{{ session('success') }}</div>
    @endif

    <div class="w-75 m-auto text-end mb-2">
        <a href="{{ route('products.create') }}"><button class="btn btn-success">Add Product</button></a>
    </div>

    <table class="table table-striped w-75 m-auto">
        <thead>
            <th>id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Category</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($products as $product)
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
                <td>
                    <a href="{{ route('products.show', $product->id) }}"><button class="btn btn-warning">View</button></a>
                    <a href="{{ route('products.edit', $product->id) }}"><button class="btn btn-primary">Edit</button></a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="post" style="display:inline">
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
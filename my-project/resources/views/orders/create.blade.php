<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Add Order</title>
</head>
<body>
    <h1 style="text-align: center;color:red">Add New Order</h1>

    <div class="w-50 m-auto">
        <form action="{{ route('orders.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label>User</label>
                <select name="user_id" class="form-control">
                    <option value="">-- Choose User --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('user_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div id="items">
                <div class="row mb-2">
                    <div class="col">
                        <select name="product_id[]" class="form-control">
                            <option value="">-- Product --</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }} ({{ $product->price }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <input type="number" name="quantity[]" class="form-control" placeholder="Quantity" min="1">
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-secondary mb-3" onclick="addItem()">+ Add Product</button>
            <br>

            <button type="submit" class="btn btn-success">Save Order</button>
            <a href="{{ route('orders.index') }}"><button type="button" class="btn btn-secondary">Cancel</button></a>
        </form>
    </div>

    <script>
        function addItem() {
            const container = document.getElementById('items');
            const row = container.children[0].cloneNode(true);
            row.querySelectorAll('input, select').forEach(el => el.value = '');
            container.appendChild(row);
        }
    </script>
</body>
</html>
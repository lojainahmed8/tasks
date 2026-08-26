<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <h1 style="text-align: center;color:red">Login</h1>

    <div class="w-50 m-auto">
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <form action="{{ route('login.post') }}" method="post">
            @csrf

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Login</button>
            <a href="{{ route('register') }}">Don't have an account? Register</a>
        </form>
    </div>
</body>
</html>
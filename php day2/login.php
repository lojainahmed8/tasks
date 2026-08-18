<?php
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $registered = isset($_SESSION['registered_user']) ? $_SESSION['registered_user'] : null;

    if (($email == 'admin@gmail.com' && $password == '123456') || 
        ($registered && $email == $registered['email'] && $password == $registered['password'])) {
        
        $_SESSION['is_logged_in'] = true;
        header("Location: allUsers.php");
        exit();
    } else {
        $error = "Invalid Email or Password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow-sm" style="width: 360px;">
        <h3 class="card-title text-center mb-3">Login</h3>

        <?php if (isset($_GET['registered'])): ?>
            <div class="alert alert-success py-2">Registered successfully! Please login.</div>
        <?php endif; ?>

        <?php if ($error != ''): ?>
            <div class="alert alert-danger py-2"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Login</button>
        </form>

        <p class="text-center text-muted mt-3 mb-0">Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</div>

</body>
</html>
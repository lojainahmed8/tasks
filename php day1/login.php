<?php

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    
    if (!empty($email) && !empty($password)) {
      
        $message = '<div class="alert alert-success">sucess login</div>';
    } else {
        $message = '<div class="alert alert-danger">please enrer email and password</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5" style="max-width: 450px;">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <h3 class="card-title text-center mb-4">Sign In</h3>
            
           
            <?= $message ?>
            
            <form action="login.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                </div>
                
                <button type="submit" class="btn btn-success w-100 fw-bold">Login</button>
            </form>
            
            <div class="text-center mt-3">
                <small class="text-muted">Don't have an account? <a href="register.php" class="text-decoration-none">Register here</a></small>
            </div>
        </div>
    </div>
</div>

</body>
</html>
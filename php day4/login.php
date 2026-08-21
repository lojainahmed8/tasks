<?php
require "./connection.php";
$error = "";

if (isset($_POST['btn-login'])) {
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $connection->prepare("SELECT * FROM employee WHERE email = :email");
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_ssn']  = $user['SSN'];
        $_SESSION['user_name'] = $user['Fname'] . " " . $user['Lname'];
        header("Location: employees.php");
        exit;
    } else {
        $error = "error in password or email";
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5" style="max-width: 450px;">
        <div class="card p-4">
            <h3 class="text-center mb-3">login</h3>
            <?php if (isset($_GET['success'])): ?><div class="alert alert-success"><?= $_GET['success'] ?></div><?php endif; ?>
            <?php if ($error): ?><div class="alert alert-danger"><?= $error ?></div><?php endif; ?>
            
            <form method="POST">
                <input class="form-control mb-3" type="email" name="email" placeholder="email" required>
                <input class="form-control mb-3" type="password" name="password" placeholder="password" required>
                <button class="btn btn-success w-100" type="submit" name="btn-login">login</button>
            </form>
            <div class="text-center mt-3">
                <a href="register.php">do you have account?</a>
            </div>
        </div>
    </div>
</body>
</html>
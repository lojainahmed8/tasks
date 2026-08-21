<?php
require "./connection.php";
$error = "";

if (isset($_POST['btn-register'])) {
    $fname    = trim($_POST['fname']);
    $lname    = trim($_POST['lname']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($fname) || empty($lname) || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 5) {
        $error = " ypur data is incorrect";
    } else {
       
        $check = $connection->prepare("SELECT SSN FROM employee WHERE email = :email");
        $check->execute([':email' => $email]);
        
        if ($check->fetch()) {
            $error = "email is registered";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $connection->prepare("INSERT INTO employee (Fname, Lname, email, password) VALUES (:fname, :lname, :email, :pass)");
            $stmt->execute([
                ':fname' => $fname,
                ':lname' => $lname,
                ':email' => $email,
                ':pass'  => $hashedPassword
            ]);
            header("Location: login.php?success=Registered successfully! Please login.");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5" style="max-width: 500px;">
        <div class="card p-4">
            <h3 class="text-center mb-3"> new account</h3>
            <?php if ($error): ?><div class="alert alert-danger"><?= $error ?></div><?php endif; ?>
            
            <form method="POST">
                <input class="form-control mb-3" type="text" name="fname" placeholder="first name" required>
                <input class="form-control mb-3" type="text" name="lname" placeholder="last name" required>
                <input class="form-control mb-3" type="email" name="email" placeholder="email" required>
                <input class="form-control mb-3" type="password" name="password" placeholder="password" required>
                <button class="btn btn-primary w-100" type="submit" name="btn-register">register</button>
            </form>
            <div class="text-center mt-3">
                <a href="login.php">you have account?</a>
            </div>
        </div>
    </div>
</body>
</html>
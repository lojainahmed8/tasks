<?php
session_start();

if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

$users = [
    ["id" => 1, "userName" => "mahmoud", "UserEmail" => "mahmoud@gmail.com"],
    ["id" => 2, "userName" => "nada",    "UserEmail" => "nada@gmail.com"],
    ["id" => 3, "userName" => "malak",   "UserEmail" => "malak@gmail.com"]
];


if (isset($_SESSION['registered_user'])) {
    $users[] = [
        "id" => count($users) + 1,
        "userName" => $_SESSION['registered_user']['username'],
        "UserEmail" => $_SESSION['registered_user']['email']
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Users</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <h2>All Users Data</h2>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>id</th>
                <th>userName</th>
                <th>UserEmail</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['userName']; ?></td>
                    <td><?php echo $user['UserEmail']; ?></td>
                    <td>
                        <a href="#">[delete]</a>
                        <a href="#">[update]</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br><br>
    <a href="logout.php">Logout</a>

</body>
</html>
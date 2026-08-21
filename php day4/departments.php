<?php
require "./connection.php";

if (!isset($_SESSION['user_ssn'])) { header("Location: login.php"); exit; }

// Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $connection->prepare("DELETE FROM department WHERE Dnum = :id");
    $stmt->execute([':id' => $id]);
    header("Location: departments.php");
    exit;
}

// Edit Fetch
$dnum = ""; $dname = ""; $isEdit = false;
if (isset($_GET['edit'])) {
    $dnum = $_GET['edit'];
    $stmt = $connection->prepare("SELECT * FROM department WHERE Dnum = :id");
    $stmt->execute([':id' => $dnum]);
    $dept = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($dept) { $dname = $dept['Dname']; $isEdit = true; }
}

// Save
if (isset($_POST['save'])) {
    $name = $_POST['dname'];
    $id = $_POST['dnum'];

    if (!empty($id)) {
        $stmt = $connection->prepare("UPDATE department SET Dname = :name WHERE Dnum = :id");
        $stmt->execute([':name' => $name, ':id' => $id]);
    } else {
        $stmt = $connection->prepare("INSERT INTO department (Dname) VALUES (:name)");
        $stmt->execute([':name' => $name]);
    }
    header("Location: departments.php");
    exit;
}

$stmt = $connection->prepare("SELECT * FROM department");
$stmt->execute();
$departments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Departments CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Departments Management</h2>
        <a href="employees.php" class="btn btn-secondary">Back to Employees</a>
    </div>

    <div class="card p-3 mb-4">
        <form method="POST" class="row g-3">
            <input type="hidden" name="dnum" value="<?= $dnum ?>">
            <div class="col-md-8">
                <input type="text" name="dname" value="<?= $dname ?>" class="form-control" placeholder="Department Name" required>
            </div>
            <div class="col-md-4">
                <button type="submit" name="save" class="btn btn-primary"><?= $isEdit ? "Update" : "Add" ?></button>
            </div>
        </form>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr><th>Dnum</th><th>Department Name</th><th>Actions</th></tr>
        </thead>
        <tbody>
            <?php foreach ($departments as $d): ?>
                <tr>
                    <td><?= $d['Dnum'] ?></td>
                    <td><?= $d['Dname'] ?></td>
                    <td>
                        <a href="departments.php?edit=<?= $d['Dnum'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="departments.php?delete=<?= $d['Dnum'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
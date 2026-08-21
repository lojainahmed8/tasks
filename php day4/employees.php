<?php
require "./connection.php";

if (!isset($_SESSION['user_ssn'])) {
    header("Location: login.php");
    exit;
}

// 1. DELETE
if (isset($_GET['delete'])) {
    $ssn = $_GET['delete'];
    $stmt = $connection->prepare("DELETE FROM employee WHERE SSN = :ssn");
    $stmt->execute([':ssn' => $ssn]);
    header("Location: employees.php");
    exit;
}

// 2. FETCH FOR EDIT
$editSSN = ""; $fname = ""; $lname = ""; $salary = ""; $isEdit = false;
if (isset($_GET['edit'])) {
    $editSSN = $_GET['edit'];
    $stmt = $connection->prepare("SELECT * FROM employee WHERE SSN = :ssn");
    $stmt->execute([':ssn' => $editSSN]);
    $emp = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($emp) {
        $fname = $emp['Fname']; $lname = $emp['Lname']; $salary = $emp['Salary'];
        $isEdit = true;
    }
}

// 3. CREATE / UPDATE
if (isset($_POST['save'])) {
    $f = $_POST['fname']; $l = $_POST['lname']; $sal = $_POST['salary'];
    $targetSSN = $_POST['ssn'];

    if (!empty($targetSSN)) {
        $stmt = $connection->prepare("UPDATE employee SET Fname = :f, Lname = :l, Salary = :sal WHERE SSN = :ssn");
        $stmt->execute([':f' => $f, ':l' => $l, ':sal' => $sal, ':ssn' => $targetSSN]);
    } else {
        $stmt = $connection->prepare("INSERT INTO employee (Fname, Lname, Salary) VALUES (:f, :l, :sal)");
        $stmt->execute([':f' => $f, ':l' => $l, ':sal' => $sal]);
    }
    header("Location: employees.php");
    exit;
}

// 4. READ
$stmt = $connection->prepare("SELECT * FROM employee");
$stmt->execute();
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employees CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Employees Management</h2>
        <div>
            <a href="departments.php" class="btn btn-outline-primary">Departments</a>
            <a href="projects.php" class="btn btn-outline-primary">Projects</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <!-- Form Add/Edit -->
    <div class="card p-3 mb-4">
        <h4><?= $isEdit ? "Edit Employee" : "Add New Employee" ?></h4>
        <form method="POST" class="row g-3">
            <input type="hidden" name="ssn" value="<?= $editSSN ?>">
            <div class="col-md-4">
                <input type="text" name="fname" value="<?= $fname ?>" class="form-control" placeholder="First Name" required>
            </div>
            <div class="col-md-4">
                <input type="text" name="lname" value="<?= $lname ?>" class="form-control" placeholder="Last Name" required>
            </div>
            <div class="col-md-4">
                <input type="number" name="salary" value="<?= $salary ?>" class="form-control" placeholder="Salary">
            </div>
            <div class="col-12">
                <button type="submit" name="save" class="btn btn-<?= $isEdit ? 'warning' : 'success' ?>">
                    <?= $isEdit ? "Update Employee" : "Save Employee" ?>
                </button>
                <?php if ($isEdit): ?><a href="employees.php" class="btn btn-secondary">Cancel</a><?php endif; ?>
            </div>
        </form>
    </div>

    <!-- Read Table -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>SSN</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Salary</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $e): ?>
                <tr>
                    <td><?= $e['SSN'] ?></td>
                    <td><?= $e['Fname'] ?></td>
                    <td><?= $e['Lname'] ?></td>
                    <td><?= $e['email'] ?? 'N/A' ?></td>
                    <td><?= $e['Salary'] ?></td>
                    <td>
                        <a href="employees.php?edit=<?= $e['SSN'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="employees.php?delete=<?= $e['SSN'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
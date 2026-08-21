<?php
require "./connection.php";

if (!isset($_SESSION['user_ssn'])) { header("Location: login.php"); exit; }

// Delete
if (isset($_GET['delete'])) {
    $pnumber = $_GET['delete'];
    $stmt = $connection->prepare("DELETE FROM project WHERE Pnumber = :id");
    $stmt->execute([':id' => $pnumber]);
    header("Location: projects.php");
    exit;
}

// Edit Fetch
$pnumber = ""; $pname = ""; $plocation = ""; $isEdit = false;
if (isset($_GET['edit'])) {
    $pnumber = $_GET['edit'];
    $stmt = $connection->prepare("SELECT * FROM project WHERE Pnumber = :id");
    $stmt->execute([':id' => $pnumber]);
    $prj = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($prj) { $pname = $prj['Pname']; $plocation = $prj['Plocation']; $isEdit = true; }
}

// Save
if (isset($_POST['save'])) {
    $name = $_POST['pname'];
    $loc  = $_POST['plocation'];
    $id   = $_POST['pnumber'];

    if (!empty($id)) {
        $stmt = $connection->prepare("UPDATE project SET Pname = :name, Plocation = :loc WHERE Pnumber = :id");
        $stmt->execute([':name' => $name, ':loc' => $loc, ':id' => $id]);
    } else {
        $stmt = $connection->prepare("INSERT INTO project (Pname, Plocation) VALUES (:name, :loc)");
        $stmt->execute([':name' => $name, ':loc' => $loc]);
    }
    header("Location: projects.php");
    exit;
}

$stmt = $connection->prepare("SELECT * FROM project");
$stmt->execute();
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Projects CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Projects Management</h2>
        <a href="employees.php" class="btn btn-secondary">Back to Employees</a>
    </div>

    <div class="card p-3 mb-4">
        <form method="POST" class="row g-3">
            <input type="hidden" name="pnumber" value="<?= $pnumber ?>">
            <div class="col-md-5">
                <input type="text" name="pname" value="<?= $pname ?>" class="form-control" placeholder="Project Name" required>
            </div>
            <div class="col-md-5">
                <input type="text" name="plocation" value="<?= $plocation ?>" class="form-control" placeholder="Location">
            </div>
            <div class="col-md-2">
                <button type="submit" name="save" class="btn btn-primary"><?= $isEdit ? "Update" : "Add" ?></button>
            </div>
        </form>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr><th>Pnumber</th><th>Project Name</th><th>Location</th><th>Actions</th></tr>
        </thead>
        <tbody>
            <?php foreach ($projects as $p): ?>
                <tr>
                    <td><?= $p['Pnumber'] ?></td>
                    <td><?= $p['Pname'] ?></td>
                    <td><?= $p['Plocation'] ?></td>
                    <td>
                        <a href="projects.php?edit=<?= $p['Pnumber'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="projects.php?delete=<?= $p['Pnumber'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
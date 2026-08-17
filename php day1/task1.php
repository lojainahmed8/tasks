<?php
$data = [
    ["name" => "basmala", "address" => "cairo"],
    ["name" => "habiba", "address" => "sadat"],
    ["name" => "mohammed", "address" => "menoufia"]
];
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>show data</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">

<div class="container">
    <h2 class="mb-4">list of names and address</h2>
    
   
    <table class="table table-striped table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $index => $row): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= ucfirst($row['name']) ?></td>
                    <td><?= ucfirst($row['address']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
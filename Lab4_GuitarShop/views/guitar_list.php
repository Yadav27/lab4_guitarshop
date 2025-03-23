<?php
require_once __DIR__ . '/../models/Guitar.php';

$guitarModel = new Guitar();
$guitars = $guitarModel->getAllGuitars();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Guitar List</title>
</head>
<body>
    <h2>Available Guitars</h2>
    <ul>
        <?php foreach ($guitars as $guitar) : ?>
            <li><?= $guitar['name'] ?> - <?= $guitar['brand'] ?> ($<?= $guitar['price'] ?>)</li>
        <?php endforeach; ?>
    </ul>
</body>
</html>

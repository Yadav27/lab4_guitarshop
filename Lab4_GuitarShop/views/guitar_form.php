<?php
require_once '../controllers/GuitarController.php';

$guitar = null;
if (isset($_GET['id'])) {
    $guitarController = new GuitarController();
    $guitar = $guitarController->getGuitarById($_GET['id']);
}

$action = $guitar ? "../controllers/GuitarController.php?action=update&id=".$guitar['id'] : "../controllers/GuitarController.php?action=add";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $guitar ? "Edit" : "Add" ?> Guitar</title>
</head>
<body>
    <h2><?= $guitar ? "Edit" : "Add" ?> Guitar</h2>
    <form action="<?= $action ?>" method="POST">
        <input type="text" name="name" placeholder="Guitar Name" required value="<?= $guitar['name'] ?? '' ?>">
        <input type="text" name="brand" placeholder="Brand" required value="<?= $guitar['brand'] ?? '' ?>">
        <input type="number" step="0.01" name="price" placeholder="Price" required value="<?= $guitar['price'] ?? '' ?>">
        <input type="number" name="stock" placeholder="Stock" required value="<?= $guitar['stock'] ?? '' ?>">
        <button type="submit"><?= $guitar ? "Update" : "Add" ?> Guitar</button>
    </form>
    <a href="guitar_list.php">Back to Guitar List</a>
</body>
</html>

<?php
session_start();
require_once 'controllers/GuitarController.php';

$guitarController = new GuitarController();
$guitars = $guitarController->getAllGuitars();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guitar Shop</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

    <!-- Navigation Bar -->
    <nav>
        <h2>Guitar Shop</h2>
        <ul>
            <li><a href="index.php">Home</a></li>
            <?php if (isset($_SESSION['user'])): ?>
                <li><a href="views/cart.php">Cart</a></li>
                <li><a href="views/logout.php">Logout (<?= $_SESSION['user']['name'] ?>)</a></li>
            <?php else: ?>
                <li><a href="views/login.php">Login</a></li>
                <li><a href="views/register.php">Register</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <!-- Guitar List -->
    <h2>Available Guitars</h2>
    <div class="guitar-list">
        <?php if (empty($guitars)): ?>
            <p>No guitars available.</p>
        <?php else: ?>
            <?php foreach ($guitars as $guitar): ?>
                <div class="guitar-item">
                    <h3><?= $guitar['name'] ?></h3>
                    <p>Brand: <?= $guitar['brand'] ?></p>
                    <p>Price: $<?= $guitar['price'] ?></p>
                    <p>Stock: <?= $guitar['stock'] ?> left</p>
                    <form action="controllers/CartController.php?action=add&id=<?= $guitar['id'] ?>" method="POST">
                        <button type="submit">Add to Cart</button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <footer>
        <p>&copy; <?= date('Y') ?> Guitar Shop. All rights reserved.</p>
    </footer>

</body>
</html>

<?php session_start(); ?>
<h2>Shopping Cart</h2>
<ul>
    <?php foreach ($_SESSION['cart'] as $id => $quantity): ?>
        <li>Guitar ID: <?= $id ?> - Quantity: <?= $quantity ?></li>
    <?php endforeach; ?>
</ul>

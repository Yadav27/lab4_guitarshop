<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Checkout</title>
</head>
<body>
    <h2>Checkout</h2>
    <form action="../controllers/OrderController.php?action=checkout" method="POST">
        <button type="submit">Place Order</button>
    </form>
</body>
</html>

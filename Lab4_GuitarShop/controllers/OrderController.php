<?php
require_once __DIR__ . '/../models/Order.php';
session_start();

class OrderController {
    public function checkout() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user'])) {
            $orderModel = new Order();
            $orderModel->createOrder($_SESSION['user']['id'], $_SESSION['cart']);
            unset($_SESSION['cart']);
            header("Location: ../views/order_success.php");
        }
    }
}
?>

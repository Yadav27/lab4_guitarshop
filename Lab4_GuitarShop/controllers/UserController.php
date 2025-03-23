<?php
require_once __DIR__ . '/../models/User.php';

class UserController {
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User();
            $user->register($_POST['name'], $_POST['email'], $_POST['password']);
            header("Location: ../views/login.php");
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User();
            $authenticatedUser = $user->login($_POST['email'], $_POST['password']);
            if ($authenticatedUser) {
                session_start();
                $_SESSION['user'] = $authenticatedUser;
                header("Location: ../views/index.php");
            } else {
                echo "Invalid credentials!";
            }
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: ../views/login.php");
    }
}
?>

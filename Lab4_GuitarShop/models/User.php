<?php
require_once __DIR__ . '/../config/database.php';

class User {
    private $conn;
    private $table = "users";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function register($name, $email, $password) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO " . $this->table . " (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':password' => $hashed_password
        ]);
    }

    public function login($email, $password) {
        $query = "SELECT * FROM " . $this->table . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
?>

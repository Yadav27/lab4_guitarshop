<?php
require_once __DIR__ . '/../config/database.php';

class Guitar {
    private $conn;
    private $table = "guitars";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllGuitars() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addGuitar($name, $brand, $price, $stock) {
        $query = "INSERT INTO " . $this->table . " (name, brand, price, stock) VALUES (:name, :brand, :price, :stock)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            ':name' => $name,
            ':brand' => $brand,
            ':price' => $price,
            ':stock' => $stock
        ]);
    }
}
?>

<?php
require_once __DIR__ . '/../models/Guitar.php';

class GuitarController {
    public function getAllGuitars() {
        $guitarModel = new Guitar();
        return $guitarModel->getAllGuitars();
    }

    public function addGuitar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $guitarModel = new Guitar();
            $guitarModel->addGuitar($_POST['name'], $_POST['brand'], $_POST['price'], $_POST['stock']);
            header("Location: ../views/guitar_list.php");
        }
    }
}
?>

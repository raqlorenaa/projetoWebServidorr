<?php
namespace App\Model;

use PDO;

class User {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function createUser($name, $email, $username, $password) {
        $stmt = $this->db->prepare("INSERT INTO usuarios (nome, email, username, password) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$name, $email, $username, $password]);
    }
}
?>
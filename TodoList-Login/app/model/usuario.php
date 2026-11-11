<?php
require_once __DIR__ . '/../config/db.php';

class Usuario {
    private $conn;

    public function __construct() {
        $db = new db();
        $this->conn = $db->conectar();
    }

    public function login($email) {
        $sql = 'SELECT * FROM usuario WHERE email = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    public function criar($nome, $email, $senha) {
        $sql = 'INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sss', $nome, $email, $senha);
        return $stmt->execute();
    }
}

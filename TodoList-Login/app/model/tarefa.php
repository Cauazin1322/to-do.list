<?php
require_once __DIR__ . '/../config/db.php';

class Tarefa {
    private $conn;

    public function __construct() {
        $db = new db();
        $this->conn = $db->conectar();
    }

    public function listar($usuario_id) {
        $sql = 'SELECT * FROM tarefas WHERE usuario_id = ? ORDER BY data_criacao DESC';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $usuario_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function criar($descricao, $usuario_id) {
        $sql = 'INSERT INTO tarefas (descricao, usuario_id) VALUES (?, ?)';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('si', $descricao, $usuario_id);
        return $stmt->execute();
    }

    public function excluir($id, $usuario_id) {
        $sql = 'DELETE FROM tarefas WHERE id = ? AND usuario_id = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ii', $id, $usuario_id);
        return $stmt->execute();
    }

    public function editar($descricao, $id, $usuario_id) {
        $sql = 'UPDATE tarefas SET descricao = ? WHERE id = ? AND usuario_id = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sii', $descricao, $id, $usuario_id);
        return $stmt->execute();
    }
}

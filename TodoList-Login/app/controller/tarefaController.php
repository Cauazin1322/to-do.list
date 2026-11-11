<?php
require_once __DIR__ . '/../model/tarefa.php';

class TarefaController {
    private $tarefaModel;

    public function __construct() {
        $this->tarefaModel = new Tarefa();
    }

    private function exigirLogin() {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: index.php?action=login');
            exit;
        }
    }

    public function index() {
        $this->exigirLogin();
        $tarefas = $this->tarefaModel->listar($_SESSION['usuario_id']);
        include __DIR__ . '/../view/tarefa.php';
    }

    public function criar() {
        $this->exigirLogin();
        if (isset($_POST['descricao']) && !empty(trim($_POST['descricao']))) {
            $this->tarefaModel->criar(trim($_POST['descricao']), $_SESSION['usuario_id']);
        }
        header('Location: index.php');
        exit;
    }

    public function excluir() {
        $this->exigirLogin();
        if (isset($_GET['id'])) {
            $this->tarefaModel->excluir((int) $_GET['id'], $_SESSION['usuario_id']);
        }
        header('Location: index.php');
        exit;
    }

    public function editar() {
        $this->exigirLogin();
        if (isset($_POST['id'], $_POST['descricao']) && !empty(trim($_POST['descricao']))) {
            $this->tarefaModel->editar(trim($_POST['descricao']), (int) $_POST['id'], $_SESSION['usuario_id']);
        }
        header('Location: index.php');
        exit;
    }
}

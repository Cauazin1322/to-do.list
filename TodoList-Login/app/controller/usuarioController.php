<?php
require_once __DIR__ . '/../model/usuario.php';

class UsuarioController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    public function formLogin() {
        if (isset($_SESSION['usuario_id'])) {
            header('Location: index.php');
            exit;
        }
        include __DIR__ . '/../view/login.php';
    }

    public function autenticar() {
        if (!isset($_POST['email'], $_POST['senha'])) {
            header('Location: index.php?action=login');
            exit;
        }

        $email = trim($_POST['email']);
        $senha = $_POST['senha'];

        if (!empty($email) && !empty($senha)) {
            $usuario = $this->usuarioModel->login($email);

            if ($usuario && password_verify($senha, $usuario['senha'])) {
                session_regenerate_id(true);
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nome'] = $usuario['nome'];
                $_SESSION['usuario_email'] = $usuario['email'];
                header('Location: index.php');
                exit;
            }
        }

        $erro = 'E-mail ou senha incorretos.';
        include __DIR__ . '/../view/login.php';
    }

    public function formRegistro() {
        include __DIR__ . '/../view/register.php';
    }

    public function registrar() {
        if (!isset($_POST['nome'], $_POST['email'], $_POST['senha'])) {
            header('Location: index.php?action=registro');
            exit;
        }

        $nome = trim($_POST['nome']);
        $email = trim($_POST['email']);
        $senha = $_POST['senha'];

        if (empty($nome) || empty($email) || empty($senha)) {
            $erro = 'Preencha todos os campos.';
            include __DIR__ . '/../view/register.php';
            return;
        }

        if ($this->usuarioModel->login($email)) {
            $erro = 'Esse e-mail já está cadastrado.';
            include __DIR__ . '/../view/register.php';
            return;
        }

        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $this->usuarioModel->criar($nome, $email, $hash);
        header('Location: index.php?action=login');
        exit;
    }

    public function logout() {
        session_destroy();
        header('Location: index.php?action=login');
        exit;
    }
}

<?php
session_start();

require_once __DIR__ . '/app/controller/usuarioController.php';
require_once __DIR__ . '/app/controller/tarefaController.php';

$usuarioController = new UsuarioController();
$tarefaController = new TarefaController();

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'login':      $usuarioController->formLogin(); break;
    case 'autenticar': $usuarioController->autenticar(); break;
    case 'registro':   $usuarioController->formRegistro(); break;
    case 'registrar':  $usuarioController->registrar(); break;
    case 'logout':     $usuarioController->logout(); break;
    case 'criar':      $tarefaController->criar(); break;
    case 'excluir':    $tarefaController->excluir(); break;
    case 'editar':     $tarefaController->editar(); break;
    default:           $tarefaController->index(); break;
}

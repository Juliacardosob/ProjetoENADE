<?php
require_once("conexao.php");
require_once("dao/UserDAO.php");
if (!isset($_SESSION)) {
    session_start();
}


if (isset($_POST["entrar"])) {

    $User = new UserDAO($conn);

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    if (!$User->verificarAdmin($usuario, $senha)) {
        if ($User->verificarCadastrado($usuario,$senha)) {
            return true;
        } else {
            return false;
            $_SESSION['msg'] = "Não cadastrado";
        }
    } else {
        header("Location: ../adm/inserirQuestoes.php");
    }

    $conn = null;
}

<?php
include_once("conexao.php");
include_once("../backend/entities/UserDAO.php");

if (isset($_POST["cadastrar"])) {
    $User = new UserDAO($conn);
    $newUser = new User();

    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    $senha = $_POST["password"];
    $conf_senha = $_POST["confirme"];

    if (!empty($_POST["foto"])) {
        $foto = $_POST["foto"];
    } else {
        $foto = "default.png";
    }

    if ($newUser->verificarSenha($senha, $conf_senha)) {
        if (!$User->verificarCadastrado($usuario)) {
            
            $newUser->setUsuario($usuario);
            $newUser->setEmail($email);
            $newUser->setSenha($senha);
            $newUser->setFoto($foto);

            $User->Cadastrar($newUser);
            header("Location: ../pages/login.php");
            $_SESSION['msg'] = "";
        } else {
            $_SESSION['msg'] = "Aluno " . $usuario . " já cadastrado";
            return;
        }
    } else {
        $_SESSION['msg'] = "As senhas não correspondem";
        return;
    }

    $conn = null;
}

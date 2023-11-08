<?php
include_once("conexao.php");
include_once("../backend/entities/UserDAO.php");

if (!isset($_SESSION)) {
    session_start();
}
else{
    if(isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
    }
} 

if(isset($_POST["editar"])){
    $User = new UserDAO($conn);
    $userEdit = new UserEdit();

    

    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    // $foto = $_POST["foto"];
    $senha = $_POST["senha"];
    $conf_senha = $_POST["conf_senha"];

    if($userEdit->verificarSenha($senha, $conf_senha)){
        if(!$User->verificarCadastrado($usuario)){
            $userEdit->setUsuario($usuario);
            $userEdit->setEmail($email);
            $userEdit->setSenha($senha);
            // $userEdit->setFoto($foto);

            $User->atualizarCadastro($id, $userEdit);
            $_SESSION['msg'] = "";
        }
        else {
            $_SESSION['msg'] = "Usuário: " . $usuario . " já cadastrado";
            return;
        }
    }
    else{
        $_SESSION['msg'] = "As senhas não correspondem";
    }

    $conn = null;
 }
 
    

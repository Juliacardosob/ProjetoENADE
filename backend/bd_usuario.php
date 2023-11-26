<?php

use function PHPSTORM_META\type;

require_once("conexao.php");
require_once("dao/UserDAO.php");

if (!isset($_SESSION)) {
    session_start();
    
}

$User = new UserDAO($conn);
$newUser = new User();

$type = filter_input(INPUT_POST, "type");

if ($type == "cadastrar") {

    $apelido = filter_input(INPUT_POST, "apelido");
    $nome = filter_input(INPUT_POST, "nome");
    $sobrenome = filter_input(INPUT_POST, "sobrenome");
    $email = filter_input(INPUT_POST, "email");
    $senha = filter_input(INPUT_POST, "senha");
    $conf_senha = filter_input(INPUT_POST, "confirme");

    $foto = "default.png";


    if ($newUser->verificarSenha($senha, $conf_senha)) {
        if (!$User->verificarCadastrado($apelido, $senha)) {
            $newUser->setApelido($apelido);
            $newUser->setNome($nome);
            $newUser->setSobrenome($sobrenome);
            $newUser->setEmail($email);
            $newUser->setSenha($senha);
            $newUser->setFoto($foto);

            $User->cadastrarAluno($newUser);

            header("Location: ../pages/login.php");
            $_SESSION['msg'] = "";
        } else {
            $_SESSION['msg'] = "Aluno " . $apelido . " já cadastrado";
            return;
        }
    } else {
        $_SESSION['msg'] = "As senhas não correspondem";
        return;
    }

    $conn = null;
} elseif ($type == "cadastrarADM") {

    $apelido = filter_input(INPUT_POST,  "apelido");
    $nome = filter_input(INPUT_POST, "nome");
    $sobrenome = filter_input(INPUT_POST, "sobrenome");
    $email = filter_input(INPUT_POST, "email");
    $senha = filter_input(INPUT_POST, "senha");
    $confirme = filter_input(INPUT_POST, "confirme");

    $foto = "default.png";

    if ($newUser->verificarSenha($senha, $confirme)) {
        if (!$User->verificarCadastrado($nome, $senha)) {

            $newUser->setApelido($apelido);
            $newUser->setNome($nome);
            $newUser->setSobrenome($sobrenome);
            $newUser->setEmail($email);
            $newUser->setSenha($senha);
            $newUser->setFoto($foto);

            $User->cadastrarAdmin($newUser);

            header("Location: ../pages/login.php");
            $_SESSION['msg'] = "";
        } else {
            $_SESSION['msg'] = "ADM " . $nome . " já cadastrado";
            return;
        }
    } else {
        $_SESSION['msg'] = "As senhas não correspondem";
        return;
    }

    $conn = null;
} elseif ($type == "entrar") {

    $User = new UserDAO($conn);

    $usuario = filter_input(INPUT_POST, "apelido");
    $senha = filter_input(INPUT_POST, "senha");

    if (!$User->verificarAdmin($usuario, $senha)) {
        if ($User->verificarCadastrado($usuario, $senha)) {
            return true;
        } else {
            return false;
        }
    } else {
    }

    $conn = null;
} elseif ($type == "editarDados") {

    $id = $_SESSION["id_usuario"];

    $apelido = filter_input(INPUT_POST, "apelido");
    $email = filter_input(INPUT_POST, "email");
    $nome = filter_input(INPUT_POST, "nome");
    $sobrenome = filter_input(INPUT_POST, "sobrenome");
    if (!$User->verificarUsuario($apelido)) {

        $newUser->setApelido($apelido);
        $newUser->setEmail($email);
        $newUser->setNome($nome);
        $newUser->setSobrenome($sobrenome);

        $User->atualizarCadastro($id, $newUser);
        header("Location: ../pages/perfil.php");
        $_SESSION["msg"] = "Atualizado com sucesso";
        $_SESSION["type"] = "Done"; 
    } else {
        header("Location: ../pages/perfil.php");
        $_SESSION["msg"] = "Nome de usuário já existe";
        $_SESSION["type"] = "Error"; 
    }
    $conn = null;
} elseif ($type == "editarSenha") {

    $id = $_SESSION["id_usuario"];

    $senha = filter_input(INPUT_POST, "senha");
    $confirme = filter_input(INPUT_POST, "confirme");
    if ($newUser->verificarSenha($senha, $confirme)) {
        $newUser->setSenha($senha);
        $User->atualizarSenha($id, $newUser);
        header("Location: ../pages/perfil.php");
    } else {
        /**Senha não conferem */
    }
    $conn = null;
} elseif($type == "delete"){

    $id = filter_input(INPUT_POST, "id");

    $User->deletarAluno($id);

    header("Location: ../adm/gerenciarUsuarios.php");
}

elseif($type == "photo"){
    if(isset($_FILES["foto"]) && !empty($_FILES["foto"]["tmp_name"])){

        $foto = $_FILES["foto"];
        print_r($_FILES);
        $fotoTypes = ["image/jpeg", "image/jpg", "image/png"];
        $jpgArray = ["image/jpeg", "image/jpg"];

        if(in_array($foto["type"], $fotoTypes)){

            //checando tipo de imagem
            if(in_array($foto["type"], $jpgArray)){
                $imageFile = imagecreatefromjpeg($foto["tmp_name"]);

            }
            else{
                $imageFile = imagecreatefrompng($foto["tmp_name"]);
            }

            $imageName = $newUser->generateImageName();

            imagejpeg($imageFile, "../img/fotos_perfil/".$imageName, 100);
    
            $id = $_SESSION["id_usuario"];

            $User->atualizarFoto($id, $imageName);
            $_SESSION["msg"] = "Imagem alterada com sucesso!";
            header("Location: ../pages/perfil.php");
        }
        else{
            $_SESSION["msg"] = "Coloque uma imagem do tipo jpg ou png";
            header("Location: ../pages/perfil.php");
        }
    }
}
<?php
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

    // if (!empty($foto)) {
    //     $foto = $_FILES["foto"]["name"];
    //     $foto_s = $_FILES["foto"]["tmp_name"];

    //     $caminhobd = "fotos_perfil/$apelido/$foto";

    //     mkdir("../img/fotos_perfil/$apelido", 0755, true);
    //     $move = move_uploaded_file($foto_s, "../img/$caminhobd");
    // } else {

    //     $caminhobd = "default.png";
    // }

    if ($newUser->verificarSenha($senha, $conf_senha)) {
        if (!$User->verificarCadastrado($apelido, $senha)) {
            $newUser->setApelido($apelido);
            $newUser->setNome($nome);
            $newUser->setSobrenome($sobrenome);
            $newUser->setEmail($email);
            $newUser->setSenha($senha);
            $newUser->setFoto($foto);

            $User->cadastrarAluno($newUser);

            // $add_f = $conn->prepare("UPDATE aluno SET foto = ? WHERE usuario = ?");
            // $add_f->execute([$caminhobd, $usuario]);

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
}

if (isset($_POST["cadastrarADM"])) {

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $conf_senha = $_POST["confirme"];

    $foto = $_FILES["foto"]["name"];

    if (!empty($foto)) {
        $foto_s = $_FILES["foto"]["tmp_name"];

        $caminhobd = "fotos_perfil/$nome/$foto";

        mkdir("../img/fotos_perfil/$nome", 0755, true);
        $move = move_uploaded_file($foto_s, "../img/$caminhobd");
    } else {

        $caminhobd = "default.png";
    }

    if ($newUser->verificarSenha($senha, $conf_senha)) {
        if (!$User->verificarCadastrado($nome, $senha)) {

            $newUser->setNome($nome);
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
}

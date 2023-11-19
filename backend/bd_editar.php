<?php
require_once("conexao.php");
require_once("dao/UserDAO.php");

if (!isset($_SESSION)) {
    session_start();
}

$id = $_SESSION["id_usuario"];



$User = new UserDAO($conn);
$userEdit = new User();

$type = filter_input(INPUT_POST, "type");

if ($type == "editarDados") {

    $apelido = filter_input(INPUT_POST, "apelido");
    $email = filter_input(INPUT_POST, "email");
    $nome = filter_input(INPUT_POST, "nome");
    $sobrenome = filter_input(INPUT_POST, "sobrenome");
    
        $userEdit->setApelido($apelido);
        $userEdit->setEmail($email);
        $userEdit->setNome($nome);
        $userEdit->setSobrenome($sobrenome);

        $User->atualizarCadastro($id, $userEdit);
        header("Location: ../pages/perfil.php");
        $_SESSION['msg'] = "";

    $conn = null;
} elseif ($type == "editarSenha") {

    $senha = filter_input(INPUT_POST, "senha");
    $confirme = filter_input(INPUT_POST, "confirme");
    if ($userEdit->verificarSenha($senha, $confirme)) {
        $userEdit->setSenha($senha);
        $User->atualizarSenha($id, $userEdit);
        header("Location: ../pages/perfil.php");
    } else {
        /**Senha não conferem */
    }
    $conn = null;
} elseif ($type == "enviar") {
    $foton = $_FILES['foto']['name'];
    $fotontmp = $_FILES['foto']['tmp_name'];

    if (isset($foton)) {

        $select_b = $conn->query("SELECT * FROM aluno WHERE id = '$id'");
        $row = $select_b->fetch(PDO::FETCH_ASSOC);
        $fotobd = $row['foto'];

        if (strcmp($fotobd, 'default.png') == 0) {
            mkdir("../img/fotos_perfil/$id", 0755, true);
        }

        $fotonova = "fotos_perfil/$id/$foton";

        $move = move_uploaded_file($fotontmp, "../img/$fotonova");

        $update_f = $conn->prepare("UPDATE aluno SET foto = ? WHERE id = ?");
        $result = $update_f->execute([$fotonova, $id]);

        if ($move == true && $result == true) {
            echo 'foto atualizada';
            $foto = $fotonova;
        }
    } else {
        echo 'Por favor, selecione uma foto.';
    }
    $conn = null;
} else {
    /*erro*/
}

<?php
require_once("conexao.php");
require_once("dao/UserDAO.php");

if (!isset($_SESSION)) {
    session_start();
}

$id = $_SESSION["id_usuario"];



$User = new UserDAO($conn);
$newUser = new User();

$type = filter_input(INPUT_POST, "type");

if ($type == "enviar") {
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

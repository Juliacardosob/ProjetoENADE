<?php
include_once("conexao.php");

if(!isset($_SESSION)){
    session_start();
}else{
    if (isset($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario'];
    }
}

if(isset($_POST['enviar'])){
    $foton = $_FILES['foto']['name'];
    $fotontmp = $_FILES['foto']['tmp_name'];

    if(isset($foton)){

        $select_b = $conn->query("SELECT * FROM aluno WHERE usuario = '$usuario'");
        $row = $select_b->fetch(PDO::FETCH_ASSOC);
        $fotobd = $row['foto'];

        if(strcmp($fotobd, 'default.png') == 0){
            mkdir("../img/fotos_perfil/$usuario", 0755, true);
        }

        $fotonova = "fotos_perfil/$usuario/$foton";

        $move = move_uploaded_file($fotontmp, "../img/$fotonova");

        $update_f = $conn->prepare("UPDATE aluno SET foto = ? WHERE usuario = ?");
        $result = $update_f->execute([$fotonova, $usuario]);

        if($move == true && $result == true){
            echo 'foto atualizada';
            $foto = $fotonova;
        }
    }else{
        echo 'Por favor, selecione uma foto.';
    }
}
?>
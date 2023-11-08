<?php
include_once("conexao.php");

if(!isset($_SESSION)){
    session_start();
}else{
    if (isset($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario'];
        $foto = $_SESSION['foto'];
        $caminho = $_SESSION['caminho'];
    }
}

if(isset($_POST['enviar'])){
    $foton = $_FILES['mudarFoto']['name'];

    if(isset($foton)){

        $fotontmp = $_FILES['mudarFoto']['tmp_name'];

        if($caminho == '../img/'){
            $_SESSION['caminho'] = "../img/fotos_perfil/'$usuario'";

            $caminho = $_SESSION['caminho'];
            
            mkdir($caminho, 0755, true);
        }

        $move = move_uploaded_file($fotontmp, "$caminho/$foton");

        if($move == true){

            $_SESSION['foto'] = $foton;

            $update_f = $conn->prepare("UPDATE aluno SET foto = '$foton' WHERE usuario = '$usuario'");

            $result = $update_f->execute();
            
            if($result == true){
                echo 'foto atualizada';
            }
        }
    }else{
        echo 'Por favor, selecione uma foto.';
    }
}
?>
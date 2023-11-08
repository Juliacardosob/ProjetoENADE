<?php
include_once("conexao.php");
include_once("../backend/entities/UserDAO.php");
if(!isset($_SESSION)){
    session_start();
}else{
    $usuario = $_SESSION['usuario'];
    $foto = $_SESSION['foto'];
}

//vê se tem foto no banco do usuário
$select_f = $conn->prepare("SELECT * FROM aluno WHERE usuario = '$usuario'");
$select_f->execute();
$row = $select_f->fetch(PDO::FETCH_ASSOC);
$resul = $row['foto'];

if(isset($_POST['enviar'])){
    if(isset($_FILES['mudarFoto']['name'])){
        $foto2 = $_FILES['mudarFoto'];
        $fotonome = $_FILES['mudarFoto']['name'];
        $fotonometemp = $_FILES['mudarFoto']['tmp_name'];

        $caminho_p = "../img/fotos_perfil/'$usuario'";

        if(!realpath($caminho_p)){
            mkdir($caminho_p, 0755, true);
        }

        $move = move_uploaded_file($fotonometemp, "$caminho_p/$fotonome");

        if($move == true){
            $update_f = $conn->prepare("UPDATE aluno SET foto = '$fotonome' WHERE usuario = '$usuario'");
            $result = $update_f->execute();

            $User = new UserDAO($conn);
            $newUser = new User();
            $newUser->setFoto($foto2);
            // $User->definirVariaveisSessao($usuario, $foto2);
            
            if($result == true){
                echo 'foto adicionada';
            }
        }
    }else{
        echo 'Por favor, selecione uma foto.';
    }
}

if($resul == null){
    $caminho = '../img/';
}else{
    $caminho = "../img/fotos_perfil/'$usuario'";
}
?>
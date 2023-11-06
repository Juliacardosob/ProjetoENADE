<?php
include_once("conexao.php");
session_start();

if(isset($_SESSION['usuario'])){
    if(isset($_POST['enviar'])){
        if(isset($_FILES['mudarFoto']['name'])){
            $foto = $_FILES['mudarFoto']['name'];

            $usuario = $_SESSION['usuario'];
            $caminho = "../img/fotos_perfil/'$usuario'";

            if(!dirname($caminho) == '../img/fotos_perfil'){
                mkdir($caminho, 0755, true);
            }
            
            $move = move_uploaded_file($_FILES['mudarFoto']['tmp_name'], "$caminho/$foto");

            if($move == true){
                echo 'foto adicionada';
            }
            /*

            $inserir_bd = "UPDATE aluno SET foto = '$foto_end' WHERE usuario = '$usuario'";
            $resul = mysqli_query($mysqli, $inserir_bd);

            if($resul == true){
                echo 'Foto alterada';
            }
            */
        }else{
            echo 'Por favor, selecione uma foto.';
        }
        mysqli_close($mysqli);
    }
}else{
    echo 'Login na página não realizado';
}
?>
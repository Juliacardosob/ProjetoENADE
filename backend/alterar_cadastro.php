<?php
include_once("conexao.php");
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['usuario'])){
    if(isset($_POST['enviar'])){
        if(isset($_FILES['mudarFoto']['name'])){
            $foto = $_FILES['mudarFoto']['name'];

            $usuario = $_SESSION['usuario'];
            $caminho = "../img/fotos_perfil/'$usuario'";

            if(!realpath("../img/fotos_perfil/'$usuario'")){
                mkdir($caminho, 0755, true);
            }
            
            $move = move_uploaded_file($_FILES['mudarFoto']['tmp_name'], "$caminho/$foto");
            if($move == true){
                echo 'foto adicionada';
                $inserir_bd = mysqli_query($mysqli, "UPDATE aluno SET foto = '$foto' WHERE usuario = '$usuario'"); //alterar no banco
                $select_f = mysqli_query($mysqli, "SELECT * FROM aluno WHERE usuario = '$usuario'");

                $dados = mysqli_fetch_object($select_f);
                echo "<img src='../img/fotos_perfil/'$usuario'/'$dados->foto''/>";

            }
        }else{
            echo 'Por favor, selecione uma foto.';
        }
        mysqli_close($mysqli);
    }
}else{
    
    echo 'Login na página não realizado';
}
?>
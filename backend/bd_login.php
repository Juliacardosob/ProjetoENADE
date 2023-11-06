<?php
include_once("conexao.php");
session_start();

if(isset($_POST["entrar"])){
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    $sql_adm = "SELECT * FROM administrador WHERE usuario='$usuario' and senha='$senha'";
    $resul_adm = mysqli_query($mysqli, $sql_adm);

    if(mysqli_num_rows($resul_adm) > 0){
        $row = mysqli_fetch_assoc($resul_adm);
        if($senha == $row["senha"]){
            //TODO - página do admin
            echo 'é o admin';
        }
    }else{
        $sql = "SELECT * FROM aluno WHERE usuario='$usuario'";
        $resul = mysqli_query($mysqli, $sql);
        
        if(mysqli_num_rows($resul) > 0){
            $row = mysqli_fetch_assoc($resul);
            $foto = $row["foto"];
            if(md5($senha) == $row["senha"]){
                $_SESSION['msg'] = "Entrando...";
                $_SESSION['usuario'] = $usuario;
                $_SESSION['foto'] = $foto;
                header("Location: ../pages/painel.php");
                $_SESSION['msg'] = "";
            }else{
                $_SESSION['msg'] = "Senha incorreta";
            }
        }else{
            $_SESSION['msg'] = "Não cadastrado";
        }
    }
    mysqli_close($mysqli);
}
?>
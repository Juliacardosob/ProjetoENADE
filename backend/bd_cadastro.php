<?php
include_once("conexao.php");
include_once("entities/UserDAO.php");

$User = new UserDAO($conn);


if(isset($_POST["cadastrar"])){
    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    $senha = $_POST["password"];
    $conf_senha = $_POST["confirme"];
    $senhacripto = md5($senha);
    if(!empty($_POST["foto"])){
        $foto = $_POST["foto"];
    }
    else{
        $foto = "default.png";
    }

    $u_banco = "SELECT * FROM aluno WHERE usuario = '$usuario'";
    $resul = mysqli_query($mysqli, $u_banco);

    if(mysqli_num_rows($resul) > 0){
        $_SESSION['msg'] = "Aluno " . $usuario . " já cadastrado";
    }else if($senha != $conf_senha){
        $_SESSION['msg'] = "As senhas não correspondem";
    }else{
        $sql = "INSERT INTO aluno(usuario,senha,email_inst, foto) VALUES ('$usuario','$senhacripto','$email', '$foto')";

        if(mysqli_query($mysqli, $sql)) {
            $_SESSION['msg'] = "Aluno adicionado com sucesso";
            header("Location: ../pages/login.php");
            $_SESSION['msg'] = "";
        }else{
            $_SESSION['msg'] = "Erro no sistema";
        }
    }
    mysqli_close($mysqli);
}

?>
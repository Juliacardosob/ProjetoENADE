<?php
include_once("conexao.php");

if(isset($_POST["cadastrar"])){
    //Aluno
    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    $senha = $_POST["password"];
    $conf_senha = $_POST["confirme"];
    $senhacripto = md5($senha);

    $u_banco = "SELECT * FROM aluno WHERE usuario = '$usuario'";
    $resul = mysqli_query($mysqli, $u_banco);

    if(mysqli_num_rows($resul) > 0){
        echo 'aluno ' .$usuario.' já cadastrado no banco de dados';
    }else if($senha != $conf_senha){
        echo 'as senhas não correspondem.';
    }else{
        $sql = "INSERT INTO aluno(usuario,senha,email_inst) VALUES ('$usuario','$senhacripto','$email')";

        if(mysqli_query($mysqli, $sql)) {
            echo 'aluno adicionado';
        }else{
            echo 'tabela não encontrada';
        }
    }
    mysqli_close($mysqli);
}

?>
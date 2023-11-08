<?php

include_once("conexao.php");
if (!isset($_SESSION)) {
    session_start();
}
//include_once("entities/UserDAO.php");

//$User = new UserDAO($conn);



if(isset($_POST["editar"])){
    $usuario = $_POST["usuario"];

    $stmt = $conn->prepare("SELECT * FROM aluno WHERE usuario = :usuario");

    $stmt->bindParam(":usuario", $usuario);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $id = $row['id'];

    echo $id;

    /*if(!empty($_POST["foto"])){
        $foto = $_POST["foto"];
    }
    else{
        $foto = "default.png";
    }
    */
    
    if($stmt->rowCount() > 0){
        $email = $_POST["email"];
        $senha = $_POST["senha"];
   
        $stmt = $conn->prepare("UPDATE aluno SET email_inst = :email, senha = :senha WHERE id = :id");

        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":senha", $senha);
        $stmt->bindParam(":id", $id);

        $stmt->execute();
        
        // if(mysqli_query($mysqli, $sql)) {
        //     $_SESSION['msg'] = "Aluno adicionado com sucesso";
        //     header("Location: ../pages/perfil.php");
        //     $_SESSION['msg'] = "";
        //     echo "adc";
        // }else{
        //     $_SESSION['msg'] = "Erro no sistema";
        //     echo "erro";

        // }
    
    // }else if($senha != $conf_senha){
    //     $_SESSION['msg'] = "As senhas não correspondem";
    // }else{
    //     $_SESSION['msg'] = "Aluno ainda não cadastrado, não é possivel fazer EDICAO";
    //     echo"aluno ainda n cadastrado";
 }
 
    $conn = null;
}

?>
<?php
include_once("conexao.php");
include_once("../backend/entities/UserDAO.php");

if (!isset($_SESSION)) {
    session_start();
}
else{
    if(isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        $usuario = $_SESSION['usuario'];
    }
}

if(isset($_POST["editar"])){
    $User = new UserDAO($conn);
    $userEdit = new UserEdit();

    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    // $foto = $_POST["foto"];
    $senha = $_POST["senha"];
    $conf_senha = $_POST["conf_senha"];

    if($userEdit->verificarSenha($senha, $conf_senha)){
        if(!$User->verificarCadastrado($usuario)){
            $userEdit->setUsuario($usuario);
            $userEdit->setEmail($email);
            $userEdit->setSenha($senha);
            // $userEdit->setFoto($foto);

            $User->atualizarCadastro($id, $userEdit);
            $_SESSION['usuario'] = $userEdit->getUsuario();
            $_SESSION['msg'] = "";
        }
        else {
            $_SESSION['msg'] = "Usuário: " . $usuario . " já cadastrado";
            return;
        }
    }
    else{
        $_SESSION['msg'] = "As senhas não correspondem";
    }

    $conn = null;
 }

 if(isset($_POST['enviar'])){
    $foton = $_FILES['foto']['name'];
    $fotontmp = $_FILES['foto']['tmp_name'];

    if(isset($foton)){

        $select_b = $conn->query("SELECT * FROM aluno WHERE id = '$id'");
        $row = $select_b->fetch(PDO::FETCH_ASSOC);
        $fotobd = $row['foto'];

        if(strcmp($fotobd, 'default.png') == 0){
            mkdir("../img/fotos_perfil/$id", 0755, true);
        }

        $fotonova = "fotos_perfil/$id/$foton";

        $move = move_uploaded_file($fotontmp, "../img/$fotonova");

        $update_f = $conn->prepare("UPDATE aluno SET foto = ? WHERE id = ?");
        $result = $update_f->execute([$fotonova, $id]);

        if($move == true && $result == true){
            echo 'foto atualizada';
            $foto = $fotonova;
        }
    }else{
        echo 'Por favor, selecione uma foto.';
    }
    $conn = null;
}
 
    

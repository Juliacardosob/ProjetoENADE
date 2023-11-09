<?php
include_once("conexao.php");

if(!isset($_SESSION)){
    session_start();
}else{
    if (isset($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario'];
    }
}

if(isset($_POST['btnResponder'])){
    
    $tipo = $_POST['alternativa'];
    $cont = 0;
    if($select_btn){
        if($tipo == 'a'){
            echo "voce acertou a questao";
            $cont_acerto = $conn->prepare("UPDATE aluno SET AcertoQuest = $cont + 1 WHERE usuario = $usuario");
            $cont_acerto->execute();
        
        }
        else{
            echo "que pena, talvez outra hora";
            $acertoErro = false;
        }
    }
}
?>
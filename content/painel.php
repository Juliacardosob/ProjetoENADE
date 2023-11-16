<?php
require_once("header.php");
require_once("../backend/conexao.php");
require_once("../backend/dao/UserDAO.php");

$userDAO = new UserDAO($conn);
$user = new User();

if (!isset($_SESSION)) {
    session_start();
} else {
    if (isset($_SESSION['nome'])) {
        $id = $_SESSION['id_usuario'];
        $pontos = $userDAO->getPontos($id);
        $nome = $_SESSION['nome'];
        $foto = $user->getFoto();

    //     $select_b = $conn->query("SELECT * FROM usuario WHERE apelido = '$nome'");
    //     $row = $select_b->fetch(PDO::FETCH_ASSOC);
    //     $foto = $row['foto'];
    }
}
?>

<div id="userMenu-container">
    <div id="userDetails">
        <img src="../img/<?=$foto;?>" alt="" id="userImg">
        <div id="userDetails-txt">
            <p><?= $nome ?></p>
            <p>Pontos: <?=$pontos?></p>
        </div>
    </div>
    <div id="userActions">
        <a href="../pages/ranking.php" class="action-link"><i class="material-icons">sports_esports</i> Ranking</a>
        <a href="../pages/perfil.php" class="action-link"><i class="material-icons">account_circle</i>Perfil</a>
    </div>
</div>
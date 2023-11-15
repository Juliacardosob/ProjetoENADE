<?php
require_once("header.php");
require_once("../backend/conexao.php");

if (!isset($_SESSION)) {
    session_start();
} else {
    if (isset($_SESSION['usuario'])) {
        $nome = $_SESSION['usuario'];

        $select_b = $conn->query("SELECT * FROM aluno WHERE usuario = '$nome'");
        $row = $select_b->fetch(PDO::FETCH_ASSOC);
        $foto = $row['foto'];
    }
}
?>

<div id="userMenu-container">
    <div id="userDetails">
        <img src="../img/<?=$foto;?>" alt="" id="userImg">
        <div id="userDetails-txt">
            <p><?= $nome ?></p>
            <p>Pontos: XXXX</p>
        </div>
    </div>
    <div id="userActions">
        <a href="../pages/ranking.php" class="action-link"><i class="material-icons">sports_esports</i> Ranking</a>
        <a href="../pages/perfil.php" class="action-link"><i class="material-icons">account_circle</i>Perfil</a>
    </div>
</div>
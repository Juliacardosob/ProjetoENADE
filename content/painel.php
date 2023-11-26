<?php
require_once("header.php");
require_once("../backend/conexao.php");
require_once("../backend/dao/UserDAO.php");

$userDAO = new UserDAO($conn);
$user = new User();

if (!isset($_SESSION)) {
    session_start();
} else {
    $id = $_SESSION["id_usuario"];
    $adm = $_SESSION["adm"];
    if ($adm == false) {
        $Usuario = $userDAO->getDados($id);
    } else {
        $Usuario = $userDAO->getDadosADM($id);
    }

    //     $select_b = $conn->query("SELECT * FROM usuario WHERE apelido = '$nome'");
    //     $row = $select_b->fetch(PDO::FETCH_ASSOC);
    //     $foto = $row['foto'];
}
?>

<div id="userMenu-container">
    <div id="userDetails">
        <img src="../img/fotos_perfil/<?= $Usuario["foto"];?>" id="userImg" alt="fotoperfil" name="foto">
        <div id="userDetails-txt">
            <p><?= $Usuario['nome'] ?> <?= $Usuario['sobrenome'] ?></p>
            <?php if ($adm == false) : ?>
                <p>Pontos: <?= $Usuario['pontos'] ?></p>
            <?php else : ?>
                <p>Administrador</p>
            <?php endif ?>
        </div>
    </div>
    <div id="userActions">
        <a href="../pages/ranking.php" class="action-link"><i class="material-icons">sports_esports</i> Ranking</a>
        <?php if ($adm == false) : ?>
            <a href="../pages/perfil.php" class="action-link"><i class="material-icons">account_circle</i>Perfil</a>
        <?php else : ?>
            <a href="../adm/gerenciarQuestoes.php" class="action-link"><i class="material-icons">settings</i>Gerenciar Questões</a>
        <?php endif ?>
    </div>
</div>
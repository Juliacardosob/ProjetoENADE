<?php
require_once("body.php");

if (!isset($_SESSION)) {
    session_start();
}
?>
<header>
    <nav id="navbar">
        <ul id="navList-container">
            <li class="navbar-list">
                <a href="../pages/painel.php" class="navbar-link">Painel</a>
            </li>
            <?php if ($_SESSION["adm"] == false) : ?>
                <li class="navbar-list">
                    <a href="../pages/questoes.php" class="navbar-link">Questões</a>
                </li>
            <?php else : ?>
                <li class="navbar-list">
                    <a href="../adm/gerenciarQuestoes.php" class="navbar-link">Gerenciar Questões</a>
                </li>
                <li class="navbar-list">
                    <a href="../adm/gerenciarUsuarios.php" class="navbar-link">Gerenciar Usuários</a>
                </li>
            <?php endif; ?>
            <li class="navbar-list">
                <a href="../pages/ranking.php" class="navbar-link">Ranking</a>
            </li>
            <span class="space">
            </span>
            <?php if (!isset($_SESSION["id_usuario"])) : ?>
                <li class="navbar-list"><a href="../pages/login.php" id="nav-button" class="navbar-link">Login/Cadastro<i class="material-icons">check_circle</i></a></li>
            <?php else : ?>
                <li class="navbar-list">
                    <form action="../backend/logout.php" method="POST">
                        <input type="hidden" name="type" value="logout">
                        <button id="nav-button" class="navbar-link">Sair</button>
                    </form>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
<!-- <?php if (isset($_SESSION["msg"])) : ?>
    <div class="pop-up">
        <h1 class="msg<?= $_SESSION["type"] ?>"><?= $_SESSION["msg"] ?></h1>
    </div>
<?php endif; ?> -->
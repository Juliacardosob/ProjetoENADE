<?php
require_once("body.php");
if(!isset($_SESSION)){
    session_start();
}

?>
<header>
    <nav id="navbar">
        <ul id="navList-container">
            <li class="navbar-list">
                <a href="../pages/painel.php" class="navbar-link">Painel</a>
            </li>
            <li class="navbar-list">
                <a href="../pages/topicos.php" class="navbar-link">Questões</a>
            </li>
            <li class="navbar-list">
                <a href="../pages/ranking.php" class="navbar-link">Ranking</a>
            </li>
            <span class="space">
            </span>
            <?php if (!isset($_SESSION['usuario'])) : ?>
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
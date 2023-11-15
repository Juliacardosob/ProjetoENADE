<?php
require_once("../content/body.php");
require_once("../backend/bd_login.php");
?>
<main class="login-container">
    <form class="login-form" method="post">
    <?php if(isset($_SESSION['msg'])):?>
        <div class="pop-up">
            <h1><?= $_SESSION['msg']?></h1>
        </div>
    <?php endif;?>
        <div class="login-title">
            <img src="../img/logo.png" alt="" class="logo">
            <h1>Bem-vindo<small>Preencha com suas informações</small></h1>
        </div>
        <div class="loginInput-container">
            <div class="label-icon">
                <i class="material-icons">person</i>
                <label for="usuario">Usuário:</label>
            </div>
            <input type="text" name="usuario" class="login-input" placeholder="Preencha com seu Usuário" required>
        </div>
        <div class="loginInput-container">
            <div class="label-icon">
                <i class="material-icons">lock</i>
                <label for="senha">Senha:</label>
            </div>
            <input type="password" name="senha" class="login-input" placeholder="Preencha com sua senha" required>
        </div>
        <button class="btn-form" name="entrar">Entrar</button>
        <div class="voltarusuario">
            <span>Não tem usuário? <u><b><a href="cadastro.php">Faça o cadastro</a></u></b></span>
        </div>
    </form>
</main>
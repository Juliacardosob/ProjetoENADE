<?php
include_once("../content/body.php");
?>
<main class="login-container">
    <form class="login-form">
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
        <button class="btn-form">Entrar</button>
        <div class="voltarusuario">
            <span>Não tem usuário? <u><b><a href="#">Faça o cadastro</a></u></b></span>
        </div>
    </form>
</main>
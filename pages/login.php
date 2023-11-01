<?php
include_once("../content/body.php");
?>
<main id="login-container">
    <form id="login-form">
        <div id="login-title">
            <img src="../img/logo.png" alt="" id="logo">
            <h1>Bem-vindo<small>Preencha com suas informações</small></h1>
        </div>
        <div class="loginInput-container">
            <div class="label-icon">
                <i class="material-icons">person</i>
                <label for="usuario">Usuário:</label>
            </div>
            <input type="text" class="login-input" placeholder="Preencha com seu Usuário" required>
        </div>
        <div class="loginInput-container">
            <div class="label-icon">
                <i class="material-icons">lock</i>
                <label for="usuario">Senha:</label>
            </div>
            <input type="password" class="login-input" placeholder="Preencha com sua senha" required>
        </div>
        <button class="btn-form">Entrar</button>
    </form>
</main>
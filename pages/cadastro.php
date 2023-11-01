<?php
include_once("../content/body.php");
?>

<main class="login-container">
    <form class="login-form" id="cadastro-form">
        <div class="login-title">
            <img src="../img/logo.png" alt="" class="logo">
            <h1>Crie uma conta<small>Preencha com suas informações</small></h1>
        </div>
        <div class="loginInput-container">
            <div class="label-icon">
                <i class="material-icons">person</i>
                <label for="usuario">Usuário:</label>
            </div>
            <input type="text" class="login-input" placeholder="Preencha com seu novo Usuário" required>
        </div>
        <div class="loginInput-container">
            <div class="label-icon">
                <i class="material-icons">mail</i>
                <label for="usuario">Email:</label>
            </div>
            <input type="password" class="login-input" placeholder="Preencha com seu email" required>
        </div>
        <div class="loginInput-container">
            <div class="label-icon">
                <i class="material-icons">lock</i>
                <label for="usuario">Senha:</label>
            </div>
            <input type="password" class="login-input" placeholder="Preencha com sua nova senha" required>
        </div>

        <div class="separador"></div>
        <div class="checkpolitica ">
            <label>
                <input type="checkbox" class="check">
                Li, entendi e concordo com a <u><b><a href="#">Política de privacidade</a></u></b>
            </label>
        </div>
        <div class="separador"></div>

        <button class="btn-form">Cadastrar</button>

        <div class="separador"></div>

        <div class="voltarusuario">
            <span>Já tem usuário?  </span><a href="#">Faça o login</a>
        </div>


    </form>
</main>
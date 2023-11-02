<?php
include_once("../content/body.php");
?>

<main class="login-container">
    <form class="login-form" id="cadastro-container">
        <div class="login-title" id="cadastro-title">
            <img src="../img/logo.png" alt="" class="logo">
            <h1>Crie uma conta<small>Preencha com suas informações</small></h1>
        </div>
        <div id="cadastro-form">
            <div class="userData">
                <div class="loginInput-container  cadastroInput">
                    <div class="label-icon">
                        <i class="material-icons">person</i>
                        <label for="usuario">Usuário:</label>
                    </div>
                    <input type="text" name="usuario" class="login-input " placeholder="Preencha com seu Usuário" required>
                </div>
                <div class="loginInput-container cadastroInput">
                    <div class="label-icon">
                        <i class="material-icons">mail</i>
                        <label for="email">Email:</label>
                    </div>
                    <input type="email" name="email" class="login-input " placeholder="Preencha com seu email" required>
                </div>
            </div>
            <div class="userData">
                <div class="loginInput-container cadastroInput">
                    <div class="label-icon">
                        <i class="material-icons">lock</i>
                        <label for="password">Senha:</label>
                    </div>
                    <input type="password" name="password" class="login-input " placeholder="Preencha com sua senha" required>
                </div>
                <div class="loginInput-container cadastroInput">
                    <div class="label-icon">
                        <i class="material-icons">lock</i>
                        <label for="confirme">Confirme sua senha:</label>
                    </div>
                    <input type="password" name="conforme" class="login-input " placeholder="Confirme sua senha" required>
                </div>
            </div>
        </div>
        <div class="checkpolitica">
            <input type="checkbox" name="check" class="check" required>
            <label for="check">Li, entendi e concordo com a <u><b><a href="#">Política de privacidade</a></u></b></label>
        </div>
        <button class="btn-form">Cadastrar</button>
        <div class="voltarusuario">
            <span>Já tem usuário? <u><b><a href="#">Faça o login</a></u></b></span>
        </div>
    </form>
</main>
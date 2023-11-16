<?php
require_once("../content/body.php");
require_once("../backend/bd_cadastro.php");
?>

<main class="login-container">
    <form class="login-form" method="post" enctype="multipart/form-data">
        <input type="hidden" name="type" value="cadastrar">
        <?php if (isset($_SESSION['msg'])) : ?>
            <div class="pop-up">
                <h1><?= $_SESSION['msg'] ?></h1>
            </div>
        <?php endif; ?>
        <div class="login-title" id="cadastro-title">
            <img src="../img/logo.png" alt="" class="logo">
            <h1>Crie uma conta<small>Preencha com suas informações</small></h1>
        </div>
        <div id="cadastro-form">
            <div class="userData">
                <div class="loginInput-container  cadastroInput">
                    <div class="label-icon">
                        <i class="material-icons">person</i>
                        <label for="usuario">Apelido:</label>
                    </div>
                    <input type="text" name="apelido" class="login-input " placeholder="Preencha com seu Usuário" required>
                </div>
                <div class="loginInput-container cadastroInput">
                    <div class="label-icon">
                        <i class="material-icons">person</i>
                        <label for="primeiroNome">Nome:</label>
                    </div>
                    <input type="text" name="nome" class="login-input " placeholder="Digite seu primeiro nome" required>
                </div>
                <div class="loginInput-container cadastroInput">
                    <div class="label-icon">
                        <i class="material-icons">person</i>
                        <label for="ultimoNome">Sobrenome:</label>
                    </div>
                    <input type="text" name="sobrenome" class="login-input " placeholder="Digite seu sobrenome" required>
                </div>
                <div class="loginInput-container cadastroInput">
                    <div class="label-icon">
                        <i class="material-icons">photo</i>
                        <label for="foto">Escolha sua foto</label>
                    </div>
                    <input type="file" name="foto" accept="image/png, image/jpeg">
                </div>
            </div>
            <div class="userData">
                <div class="loginInput-container cadastroInput">
                    <div class="label-icon">
                        <i class="material-icons">mail</i>
                        <label for="email">Email:</label>
                    </div>
                    <input type="email" name="email" class="login-input " placeholder="Preencha com seu email" required>
                </div>
                <div class="loginInput-container cadastroInput">
                    <div class="label-icon">
                        <i class="material-icons">lock</i>
                        <label for="senha">Senha:</label>
                    </div>
                    <input type="password" name="senha" class="login-input " placeholder="Preencha com sua senha" required>
                </div>
                <div class="loginInput-container cadastroInput">
                    <div class="label-icon">
                        <i class="material-icons">lock</i>
                        <label for="confirme">Confirme sua senha:</label>
                    </div>
                    <input type="password" name="confirme" class="login-input " placeholder="Confirme sua senha" required>
                </div>
            </div>
        </div>
        <div class="checkpolitica">
            <input type="checkbox" name="check" class="check" required>
            <label for="check">Li, entendi e concordo com a <u><b><a href="#">Política de privacidade</a></u></b></label>
        </div>
        <button class="btn-form">Cadastrar</button>
        <div class="voltarusuario">
            <span>Já tem usuário? <u><b><a href="login.php">Faça o login</a></u></b></span>
        </div>
    </form>
</main>
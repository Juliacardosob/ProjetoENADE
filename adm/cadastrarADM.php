<?php
require_once("../content/body.php");
require_once("../backend/bd_cadastro.php");
?>

<main class="login-container">
    <form class="login-form"  method="post" enctype="multipart/form-data">
        <input type="hidden" name="type" value="cadastrarADM">
        <?php if (isset($_SESSION['msg'])) : ?>
            <div class="pop-up">
                <h1><?= $_SESSION['msg'] ?></h1>
            </div>
        <?php endif; ?>
        <div class="login-title" id="cadastro-title">
            <img src="../img/logoENADE.png" alt="" class="logoENADE">
            <h1>Bem-vindo Administrador<small>Preencha com suas informações</small></h1>
        </div>
        <div id="cadastro-form">
            <div class="userData">
                <div class="loginInput-container  cadastroInput">
                    <div class="label-icon">
                        <i class="material-icons">person</i>
                        <label for="apelido">Usuário:</label>
                    </div>
                    <input type="text" name="apelido" class="login-input " placeholder="Digite seu Usuário" required>
                </div>
                <div class="loginInput-container cadastroInput">
                    <div class="label-icon">
                        <i class="material-icons">person</i>
                        <label for="nome">Nome:</label>
                    </div>
                    <input type="text" name="nome" class="login-input " placeholder="Digite seu primeiro nome" required>
                </div>
                <div class="loginInput-container cadastroInput">
                    <div class="label-icon">
                        <i class="material-icons">person</i>
                        <label for="sobrenome">Sobrenome:</label>
                    </div>
                    <input type="text" name="sobrenome" class="login-input " placeholder="Digite seu sobrenome" required>
                </div>
            </div>
            <div class="userData">
            <div class="loginInput-container cadastroInput">
                    <div class="label-icon">
                        <i class="material-icons">mail</i>
                        <label for="email">Email:</label>
                    </div>
                    <input type="email" name="email" class="login-input " placeholder="Digite seu email" required>
                </div>
                <div class="loginInput-container cadastroInput">
                    <div class="label-icon">
                        <i class="material-icons">lock</i>
                        <label for="senha">Senha:</label>
                    </div>
                    <input type="password" name="senha" class="login-input " placeholder="Digite sua senha" required>
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
        <button class="btn-form">Cadastrar</button>
        <div class="voltarusuario">
            <span>Já tem usuário? <u><b><a href="../pages/login.php">Faça o login</a></u></b></span>
        </div>
    </form>
</main>
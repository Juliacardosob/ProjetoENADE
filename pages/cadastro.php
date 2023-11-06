<?php
include_once("../content/body.php");
include_once("../backend/bd_cadastro.php");
?>

<main class="login-container">
    <form class="login-form" id="cadastro-container" method="post">
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
                    <input type="password" name="confirme" class="login-input " placeholder="Confirme sua senha" required>
                </div>
                <div class="loginInput-container cadastroInput">
                <div class="label-icon">
                    <i class="material-icons">person</i>
                    <label for="genero">Gênero</label>
                </div>
                <select id="genero" name="genero">
                    <option value="default" selected>Selecione um gênero</option>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                    <option value="opcional">Prefiro não dizer</option>
                </select>
            </div>
            </div>
        </div>
        <div class="checkpolitica">
                <input type="checkbox" name="check" class="check" required>
                <label for="check">Li, entendi e concordo com a <u><b><a href="#">Política de privacidade</a></u></b></label>
            </div>
        <button class="btn-form" name="cadastrar">Cadastrar</button>
        <div class="voltarusuario">
            <span>Já tem usuário? <u><b><a href="login.php">Faça o login</a></u></b></span>
        </div>
    </form>
</main>
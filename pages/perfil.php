<?php
include_once("../content/header.php");
include_once("../backend/alterar_cadastro.php");
?>
<script src="../js/alterar_imagem.js" defer></script>

<main class="perfil-container">
    <div class="perfil-form">
        <div class="perfil-box">
            <div class="perfil-conteudo">
                <h1>Alterar cadastro</h1>
                    <img src="../img/logo.png" alt="fotoperfil" name="foto">
                    <form method="post" enctype="multipart/form-data">
                        <button class="btn-form btn-foto" id="btnfoto">Mudar Foto</button>
                        <div class="file">
                            <input type="file" name="mudarFoto" id="mudarFoto" accept=".png, .jpeg, .jpg">
                            <button name="enviar">Enviar</button>
                        </div>
                    </form>
            </div>
        </div>
        <hr>
        <div class="perfil-box">
            <div class="perfil-conteudo">
                <div class="loginInput-container  cadastroInput">
                    <div class="label-icon">
                        <i class="material-icons">person</i>
                        <label for="usuario">Usuário:</label>
                    </div>
                    <input type="text" name="usuario" class="login-input " placeholder="Alterar Usuário" required>
                </div>
                <div class="loginInput-container cadastroInput">
                    <div class="label-icon">
                        <i class="material-icons">mail</i>
                        <label for="email">Email:</label>
                    </div>
                    <input type="email" name="email" class="login-input " placeholder="Alterar e-mail" required>
                </div>
                <div class="loginInput-container cadastroInput">
                    <div class="label-icon">
                        <i class="material-icons">lock</i>
                        <label for="password">Senha:</label>
                    </div>
                    <input type="password" name="password" class="login-input " placeholder="Alterar senha" required>
                    <p style="margin-top: 15px; font-size: 15px;"> * caso não for alterar deixe em branco</p>
                </div>
                <div class="loginInput-container cadastroInput">
                    <div class="label-icon">
                        <i class="material-icons">lock</i>
                        <label for="password">Senha:</label>
                    </div>
                    <input type="password" name="password" class="login-input " placeholder="Confirme senha" required>
                </div>

                <button style="display: flex; align-items:center; justify-content:center; gap:10px" class="btn-form btn-atualizar"><i class="material-icons">check_circle</i><p>Atualizar dados</p></button>
            </div>
        </div>
    </div>
</main>
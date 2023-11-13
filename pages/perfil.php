<?php
include_once("../content/header.php");
include_once("../backend/bd_editar.php");
include_once("../backend/conexao.php");

if (!isset($_SESSION)) {
    session_start();
} else {
    if (isset($_SESSION['usuario'])) {
        $id = $_SESSION['id'];

        $select_b = $conn->query("SELECT * FROM aluno WHERE id = '$id'");
        $row = $select_b->fetch(PDO::FETCH_ASSOC);
        $foto = $row['foto'];
    }
}
?>
<script src="../js/alterar_imagem.js" defer></script>

<main class="perfil-container">
    <div class="perfil-form">
        <?php if (isset($_SESSION['msg'])) : ?>
            <div class="pop-up">
                <h1><?= $_SESSION['msg'] ?></h1>
            </div>
        <?php endif; ?>
        <div class="perfil-box">
            <div class="perfil-conteudo">
                <h1>Alterar cadastro</h1>
                <img src="../img/<?=$foto;?>" alt="fotoperfil" name="foto">
                <form method="post" enctype="multipart/form-data">
                    <button class="btn-form btn-foto" id="btnfoto">Mudar Foto</button>
                    <div class="file">
                        <input type="file" name="foto" id="mudarFoto" accept=".png, .jpeg, .jpg">
                        <button name="enviar">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <form method="POST" class="perfil-box">
            <div class="perfil-conteudo">
                <div class="loginInput-container  cadastroInput">
                    <div class="label-icon">
                        <i class="material-icons">person</i>
                        <label for="usuario">Usuário:</label>
                    </div>
                    <input type="text" name="usuario" class="login-input " placeholder="Alterar Usuário">
                </div>
                <div class="loginInput-container cadastroInput">
                    <div class="label-icon">
                        <i class="material-icons">mail</i>
                        <label for="email">Email:</label>
                    </div>
                    <input type="email" name="email" class="login-input " placeholder="Alterar e-mail">
                </div>
                <div class="loginInput-container cadastroInput">
                    <div class="label-icon">
                        <i class="material-icons">lock</i>
                        <label for="password">Senha:</label>
                    </div>
                    <input type="password" name="senha" class="login-input " placeholder="Alterar senha">
                    <p style="margin-top: 15px; font-size: 15px;"> * caso não for alterar deixe em branco</p>
                </div>
                <div class="loginInput-container cadastroInput">
                    <div class="label-icon">
                        <i class="material-icons">lock</i>
                        <label for="password">Senha:</label>
                    </div>
                    <input type="password" name="conf_senha" class="login-input " placeholder="Confirme senha">
                </div>

                <button style="display: flex; align-items:center; justify-content:center; gap:10px" class="btn-form btn-atualizar" name="editar"><i class="material-icons">check_circle</i>
                    <p>Atualizar dados</p>
                </button>
            </div>
        </form>
    </div>
</main>
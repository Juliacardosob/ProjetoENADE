<?php
require_once("../content/header.php");
require_once("../backend/bd_usuario.php");
require_once("../backend/conexao.php");

$user = new UserDAO($conn);

if (!isset($_SESSION)) {
    session_start();
} else {
    if (isset($_SESSION["id_usuario"])) {
        $id = $_SESSION["id_usuario"];

        $Usuario = $user->getDados($id);
    }
}
?>
<script src="../js/alterar_imagem.js" defer></script>

<main class="perfil-container">
    <div class="perfil-form">

        <div class="perfil-box">
            <div class="perfil-conteudo">
                <h1>Alterar cadastro</h1>
                <img src="../img/fotos_perfil/<?= $Usuario["foto"]; ?>" alt="fotoperfil" name="foto">
                <form action="../backend/bd_usuario.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="type" value="photo">
                    <div class="file">
                        <input type="file" name="foto" id="mudarFoto" accept=".png, .jpeg, .jpg">
                        <button name="enviar">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <div class="perfilForm-inputs">
            <form method="POST" class="userData" action="../backend/bd_usuario.php">
                <input type="hidden" name="type" value="editarDados">
                <div class="perfil-conteudo">
                    <div class="loginInput-container  cadastroInput">
                        <div class="label-icon">
                            <i class="material-icons">person</i>
                            <label for="apelido">Usuário:</label>
                        </div>
                        <input type="text" name="apelido" class="login-input" value="<?= $Usuario["apelido"] ?>" placeholder="Alterar Usuário">
                    </div>
                    <div class="loginInput-container cadastroInput">
                        <div class="label-icon">
                            <i class="material-icons">mail</i>
                            <label for="email">Email:</label>
                        </div>
                        <input type="email" name="email" class="login-input" value="<?= $Usuario["email"] ?>" placeholder="Alterar e-mail">
                    </div>
                    <div class="loginInput-container cadastroInput">
                        <div class="label-icon">
                            <i class="material-icons">person</i>
                            <label for="nome">Nome:</label>
                        </div>
                        <input type="text" name="nome" class="login-input" value="<?= $Usuario["nome"] ?>" placeholder="Alterar nome">
                    </div>
                    <div class="loginInput-container cadastroInput">
                        <div class="label-icon">
                            <i class="material-icons">person</i>
                            <label for="sobrenome">Sobrenome:</label>
                        </div>
                        <input type="text" name="sobrenome" class="login-input" value="<?= $Usuario["sobrenome"] ?>" placeholder="Alterar sobrenome">
                    </div>
                    <button style="display: flex; align-items:center; justify-content:center; gap:10px" class="btn-form"><i class="material-icons">check_circle</i>
                        <p>Atualizar dados</p>
                    </button>
                </div>
            </form>
            <form method="POST" class="userData" action="../backend/bd_usuario.php">
                <input type="hidden" name="type" value="editarSenha">
                <div class="perfil-conteudo">
                    <div class="loginInput-container cadastroInput">
                        <div class="label-icon">
                            <i class="material-icons">lock</i>
                            <label for="password">Senha:</label>
                        </div>
                        <input type="password" name="senha" class="login-input " placeholder="Altere sua senha">
                    </div>
                    <div class="loginInput-container cadastroInput">
                        <div class="label-icon">
                            <i class="material-icons">lock</i>
                            <label for="password">Confirme:</label>
                        </div>
                        <input type="password" name="confirme" class="login-input " placeholder="Confirme sua senha">
                    </div>
                    <button style="display: flex; align-items:center; justify-content:center; gap:10px" class="btn-form"><i class="material-icons">check_circle</i>
                        <p>Atualizar senha</p>
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
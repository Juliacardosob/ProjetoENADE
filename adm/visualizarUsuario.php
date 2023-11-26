<?php

require_once("../content/painel.php");
require_once("../backend/dao/UserDAO.php");
require_once("../backend/dao/QuestaoDAO.php");

$id = filter_input(INPUT_GET, "id");

$usuario;

$userDAO = new UserDAO($conn);
$questoes = new QuestaoDAO($conn);

if (empty($id)) {
    /*Usuario não encontrado */
} else {
    $usuario = $userDAO->buscarAluno($id);
}

$questoesRespondidas = $questoes->QuestoesRespondidas($id);

$questoesAcertadas = $questoes->questoesCertas($id);

$questoesErradas = $questoes->questoesErradas($id);

$taxa = $questoes->taxaAcertos($id);
?>

<main class="usuarioDetails-container">
    <div class="btnInserir-container">
        <a class="btnGerencia" href="gerenciarUsuarios.php"><i class="material-icons">arrow_back</i>Voltar</a>
    </div>
    <div id="estatisticas">
        <div class="perfil-box">
            <div class="perfil-conteudo">
                <h1><?= $usuario["nome"] ?> <?= $usuario["sobrenome"] ?></h1>
                <img src="../img/fotos_perfil/<?= $usuario["foto"]; ?>" alt="fotoperfil" name="foto">
            </div>
        </div>
        <div class="painelQuestoes-container">
            <div class="question-number">
                <h1 class="number"><?= $questoesRespondidas ?></h1>
            </div>
            <p class="numberSubtitle">Questões Resolvidas</p>
        </div>
        <div class="painelCard-container">
            <div class="cardPainel">
                <p id="certas"><?= $questoesAcertadas ?></p>
                <span>Certas</span>
                <span class="space"></span>
                <i id="certoCard" class="material-icons">check_circle_outline</i>
            </div>
            <div class="cardPainel">
                <p id="erradas"><?= $questoesErradas ?></p>
                <span>Erradas</span>
                <span class="space"></span>
                <i id="erroCard" class="material-icons">highlight_off</i>
            </div>
            <div class="cardPainel">
                <p id="taxa"><?= $taxa ?>%</p>
                <span>de acertos</span>
            </div>
        </div>
    </div>
</main>
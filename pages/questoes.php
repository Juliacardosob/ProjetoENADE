<?php
require_once("../content/painel.php");
require_once("../backend/contabilizaquestao.php");

if (!isset($_SESSION)) {
    session_start();
} else {
    if (isset($_SESSION["id_usuario"])) {
        $id_usuario = $_SESSION["id_usuario"];
    }
}

?>
<main>
    <div class="title">
        <h1>Questões ENADE - Programação</h1>
    </div>
    <?php foreach ($questaoDAO as $questao) : ?>
        <div class="questoes-container">
            <div class="questoesTitle">
                <p class="questoesTitle">Questão <?= $questao["id_questao"] ?></p>
                <p class="questoesSubTitle">Enade <?= $questao["ano"] ?></p>
            </div>
            <hr>
            <div class="questoes-content">
                <p class="questao"><?= $questao["descricao"] ?></p>
                <small class="questao-font"><?= $questao["descricao_fonte"] ?></small>
                <p class="questao-enunciado"><?= $questao["enunciado"] ?></p>
            </div>
            <div class="alternativas">
                <form method="POST" action="../backend/contabilizaquestao.php?=id">
                    <input type="hidden" name="id_questao" value="<?= $questao["id_questao"] ?>">
                    <input type="hidden" name="type" value="resposta">
                    <input type="hidden" name="id_usuario" value="<?= $id_usuario ?>">
                    <label class="alternativas-card">
                        <input class="opcaoRadio" type="radio" name="alternativa" value="a">
                        <p>A&rpar; <?= $questao["alternativaA"] ?></p>
                    </label>
                    <label class="alternativas-card">
                        <input class="opcaoRadio" type="radio" name="alternativa" value="b">
                        <p>B&rpar; <?= $questao["alternativaB"] ?></p>

                    </label>
                    <label class="alternativas-card">
                        <input class="opcaoRadio" type="radio" name="alternativa" value="c">
                        <p>C&rpar; <?= $questao["alternativaC"] ?></p>
                    </label>
                    <label class="alternativas-card">
                        <input class="opcaoRadio" type="radio" name="alternativa" value="d">
                        <p>D&rpar; <?= $questao["alternativaD"] ?></p>
                    </label>
                    <label class="alternativas-card">
                        <input class="opcaoRadio" type="radio" name="alternativa" value="e">
                        <p>E&rpar; <?= $questao["alternativaE"] ?></p>
                    </label>
                    <button class="btnResponder" name="btnResponder">Responder</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</main>
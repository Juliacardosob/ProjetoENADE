<?php
require_once("../content/painel.php");
require_once("../backend/entities/Questao.php");
require_once("../backend/dao/QuestaoDAO.php");

$id = filter_input(INPUT_GET, "id");

$questao;

$questaoDAO = new QuestaoDAO($conn);

if (empty($id)) {
    /*questão não encontrada */
} else {
    $questao = $questaoDAO->buscarQuestao($id);
}
?>

<main id="inserirQuestoes-container">
    <div id="inserirQuestoes-title">
        <h1>Editar questão</h1>
    </div>
    <form action="../backend/bd_questoes.php" id="inserirQuestoes-form" method="POST">
        <input type="hidden" name="type" value="editar">
        <input type="hidden" name="id" value="<?=$id?>">
        <div class="inserirQuestoesInput-form">
            <label for="anoProva">Enade: </label>
            <input type="text" placeholder="Digite o ano da prova" name="anoProva" value="<?= $questao["ano"]?>">
        </div>
        <div class="inserirQuestoesInput-form">
            <label for="desc">Descricao:</label>
            <textarea name="desc" placeholder="Digite o texto da questão" rows="5" cols="15"><?= $questao["descricao"]?></textarea>
        </div>
        <div class="inserirQuestoesInput-form">
            <label for="descFonte">Fonte:</label>
            <textarea name="descFonte" placeholder="Digite a fonte do texto, caso houver" rows="5" cols="10"><?= $questao["descricao_fonte"]?></textarea>
        </div>
        <div class="inserirQuestoesInput-form">
            <label for="enunciado">Enunciado:</label>
            <textarea name="enunciado" placeholder="Digite o enunciado da questão" rows="5" cols="10"><?= $questao["enunciado"]?></textarea>
        </div>
        <div class="inserirQuestoesAlternativas">
            <label for="alternativaA">Alternativa A</label>
            <input name="alternativaA" placeholder="Digite a alternativa A" value="<?= $questao["alternativaA"]?>">
        </div>
        <div class="inserirQuestoesAlternativas">
            <label for="alternativaB">Alternativa B</label>
            <input name="alternativaB" placeholder="Digite a alternativa B" value="<?= $questao["alternativaB"]?>">
        </div>
        <div class="inserirQuestoesAlternativas">
            <label for="alternativaC">Alternativa C</label>
            <input name="alternativaC" placeholder="Digite a alternativa C" value="<?= $questao["alternativaC"]?>">
        </div>
        <div class="inserirQuestoesAlternativas">
            <label for="alternativaD">Alternativa D</label>
            <input name="alternativaD" placeholder="Digite a alternativa D" value="<?= $questao["alternativaD"]?>">
        </div>
        <div class="inserirQuestoesAlternativas">
            <label for="alternativaE">Alternativa E</label>
            <input name="alternativaE" placeholder="Digite a alternativa E" value="<?= $questao["alternativaE"]?>">
        </div>
        <div class="inserirQuestoesAlternativas">
            <label for="correta">Escolha a alternativa correta: </label>
            <select name="correta">
                <option value="a">A</option>
                <option value="b">B</option>
                <option value="c">C</option>
                <option value="d">D</option>
                <option value="e">E</option>
            </select>
        </div>
        <div id="inserirQuestoesButton-container">
            <button>Editar questão</button>
        </div>
    </form>
</main>
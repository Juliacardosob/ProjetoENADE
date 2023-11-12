<?php
include_once("../content/header.php");

?>
<main id="inserirQuestoes-container">
    <div id="inserirQuestoes-title">
        <h1>Inserir questões</h1>
    </div>
    <form action="" id="inserirQuestoes-form">
        <div class="inserirQuestoesInput-form">
            <label for="numQuestao">Questão: </label>
            <input type="text" placeholder="Digite o número da questão" name="numQuestao">
        </div>
        <div class="inserirQuestoesInput-form">
            <label for="anoProva">Enade: </label>
            <input type="text" placeholder="Digite o ano da prova" name="anoProva">
        </div>
        <div class="inserirQuestoesInput-form">
            <label for="numProva">Prova: </label>
            <input type="text" placeholder="Digite o número da prova" name="numProva">
        </div>
        <div class="inserirQuestoesInput-form">
            <label for="desc">Descricao:</label>
            <textarea name="desc" placeholder="Digite o texto da questão" rows="5" cols="15"></textarea>
        </div>
        <div class="inserirQuestoesInput-form">
            <label for="descFonte">Fonte:</label>
            <textarea name="descFonte" placeholder="Digite a fonte do texto, caso houver" rows="5" cols="10"></textarea>
        </div>
        <div class="inserirQuestoesInput-form">
            <label for="enunciado">Enunciado:</label>
            <textarea name="enunciado" placeholder="Digite o enunciado da questão" rows="5" cols="10"></textarea>
        </div>
        <div class="inserirQuestoesAlternativas">
            <label for="alternativaA">Alternativa A</label>
            <input name="alternativaA" placeholder="Digite a alternativa A">
        </div>
        <div class="inserirQuestoesAlternativas">
            <label for="alternativaB">Alternativa B</label>
            <input name="alternativaB" placeholder="Digite a alternativa B">
        </div>
        <div class="inserirQuestoesAlternativas">
            <label for="alternativaC">Alternativa C</label>
            <input name="alternativaC" placeholder="Digite a alternativa C">
        </div>
        <div class="inserirQuestoesAlternativas">
            <label for="alternativaD">Alternativa D</label>
            <input name="alternativaD" placeholder="Digite a alternativa D">
        </div>
        <div class="inserirQuestoesAlternativas">
            <label for="alternativaE">Alternativa E</label>
            <input name="alternativaE" placeholder="Digite a alternativa E">
        </div>
        <div class="inserirQuestoesInput-form">
            <label for="foto">Imagem: </label>
            <input id="inserirQuestoesImagem" type="file" name="foto" accept="image/png, image/jpeg">
        </div>
        <div id="inserirQuestoesButton-container">
            <button>Enviar questão</button>
        </div>
    </form>
</main>
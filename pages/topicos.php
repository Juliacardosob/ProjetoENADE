<?php
include_once("../content/painel.php");
?>

<main>
    <div class="title">
        <h1>Questões</h1>
        <p>Escolha um tópico</p>
        <div class="Title-card">
            <div id="select-container">
                <label for="escolha"><i class="material-icons">format_list_bulleted</i></label>
                <select id="escolha" name="escolha">
                    <option value="default" selected>Selecione um tópico</option>
                    <option value="programacao">Lógica de Programação</option>
                    <option value="hardware">Estrutura de computadores/option>
                    <option value="computacao">Ciência da Computação</option>
                </select>
            </div>
        </div>
    </div>
</main>
<?php

include_once("conexao.php");

interface IQuestao{
    function criarQuestao(Questao $questao);

    function editarQuestao();

    function deletarQuestao($id);

}
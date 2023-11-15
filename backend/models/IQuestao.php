<?php

include_once("conexao.php");

interface IQuestao{
    function criarQuestao();

    function editarQuestao();

    function deletarQuestao();

}
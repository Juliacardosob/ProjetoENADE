<?php

require_once("conexao.php");
require_once("dao/QuestaoDAO.php");
require_once("entities/Questao.php");

$questao = new Questao();
$questaoDAO = new QuestaoDAO($conn);

$type = filter_input(INPUT_POST, "type");

if ($type == "inserir") {
    echo "Entrei";
    $enunciado = filter_input(INPUT_POST, "enunciado");
    $num_questao = filter_input(INPUT_POST, "numQuestao");
    $ano = filter_input(INPUT_POST, "anoProva");
    $descricao = filter_input(INPUT_POST, "desc");
    $font = filter_input(INPUT_POST, "descFonte");
    $alternativaA = filter_input(INPUT_POST, "alternativaA");
    $alternativaB = filter_input(INPUT_POST, "alternativaB");
    $alternativaC = filter_input(INPUT_POST, "alternativaC");
    $alternativaD = filter_input(INPUT_POST, "alternativaD");
    $alternativaE = filter_input(INPUT_POST, "alternativaE");
    $correta = filter_input(INPUT_POST, "correta");

    if ($enunciado && $num_questao && $ano && $alternativaA && $alternativaB && $alternativaC && $alternativaD && $correta) {
        if (!$questaoDAO->encontrarNumQuestao($num_questao)) {

            $questao->setEnunciado($enunciado);
            $questao->setNumQuestao($num_questao);
            $questao->setAno($ano);
            $questao->setDescricao($descricao);
            $questao->setFont($font);
            $questao->setAlternativaA($alternativaA);
            $questao->setAlternativaB($alternativaB);
            $questao->setAlternativaC($alternativaC);
            $questao->setAlternativaD($alternativaD);
            $questao->setAlternativaE($alternativaE);
            $questao->setCorreta($correta);

            $questaoDAO->criarQuestao($questao);
        } else {

            echo "Questao ja cadastrada";
            /*Questao já cadastrada*/
        }
    }
    else{
        echo "Dados faltantes";
        /*Dados obrigatórios faltantes*/
    }
}
else{
    echo "não entrei";
}

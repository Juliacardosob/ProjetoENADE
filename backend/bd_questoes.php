<?php

require_once("conexao.php");
require_once("dao/QuestaoDAO.php");
require_once("entities/Questao.php");

$questao = new Questao();
$questaoDAO = new QuestaoDAO($conn);

$type = filter_input(INPUT_POST, "type");

if ($type == "inserir") {

    $enunciado = filter_input(INPUT_POST, "enunciado");
    $ano = filter_input(INPUT_POST, "anoProva");
    $descricao = filter_input(INPUT_POST, "desc");
    $fonte = filter_input(INPUT_POST, "descFonte");
    $alternativaA = filter_input(INPUT_POST, "alternativaA");
    $alternativaB = filter_input(INPUT_POST, "alternativaB");
    $alternativaC = filter_input(INPUT_POST, "alternativaC");
    $alternativaD = filter_input(INPUT_POST, "alternativaD");
    $alternativaE = filter_input(INPUT_POST, "alternativaE");
    $correta = filter_input(INPUT_POST, "correta");

    if ($enunciado  && $ano && $alternativaA && $alternativaB && $alternativaC && $alternativaD && $correta) {

        $questao->setEnunciado($enunciado);
        $questao->setAno($ano);
        $questao->setDescricao($descricao);
        $questao->setFonte($fonte);
        $questao->setAlternativaA($alternativaA);
        $questao->setAlternativaB($alternativaB);
        $questao->setAlternativaC($alternativaC);
        $questao->setAlternativaD($alternativaD);
        $questao->setAlternativaE($alternativaE);
        $questao->setCorreta($correta);

        $questaoDAO->criarQuestao($questao);
        header("Location: ../adm/gerenciarQuestoes.php");
    } else {
        echo "Dados faltantes";
        /*Dados obrigatórios faltantes*/
    }
}
elseif($type == "delete"){

    $id = filter_input(INPUT_POST, "id");

    $questaoDAO->deletarQuestao($id);

    header("Location: ../adm/gerenciarQuestoes.php");
}
elseif($type == "editar"){

    $id = filter_input(INPUT_POST, "id");

    $enunciado = filter_input(INPUT_POST, "enunciado");
    $ano = filter_input(INPUT_POST, "anoProva");
    $descricao = filter_input(INPUT_POST, "desc");
    $fonte = filter_input(INPUT_POST, "descFonte");
    $alternativaA = filter_input(INPUT_POST, "alternativaA");
    $alternativaB = filter_input(INPUT_POST, "alternativaB");
    $alternativaC = filter_input(INPUT_POST, "alternativaC");
    $alternativaD = filter_input(INPUT_POST, "alternativaD");
    $alternativaE = filter_input(INPUT_POST, "alternativaE");
    $correta = filter_input(INPUT_POST, "correta");

    if ($enunciado  && $ano && $alternativaA && $alternativaB && $alternativaC && $alternativaD && $correta) {

        $questao->setEnunciado($enunciado);
        $questao->setAno($ano);
        $questao->setDescricao($descricao);
        $questao->setFonte($fonte);
        $questao->setAlternativaA($alternativaA);
        $questao->setAlternativaB($alternativaB);
        $questao->setAlternativaC($alternativaC);
        $questao->setAlternativaD($alternativaD);
        $questao->setAlternativaE($alternativaE);
        $questao->setCorreta($correta);

        $questaoDAO->editarQuestao($id, $questao);
        header("Location: ../adm/gerenciarQuestoes.php");
    } else {
        echo "Dados faltantes";
        /*Dados obrigatórios faltantes*/
    }
}

else {
    echo "não entrei";
}

<?php
require_once("conexao.php");
require_once("../backend/dao/QuestaoDAO.php");

$questao = new QuestaoDAO($conn);

$questaoDAO = $questao->buscarTodasQuestoes();

shuffle($questaoDAO);

$id_questao = filter_input(INPUT_POST, "id_questao");
$acertou = 0; /*False*/
$pontos = 0;

$resposta = filter_input(INPUT_POST, "alternativa");
$id_usuario = filter_input(INPUT_POST, "id_usuario");
$type = filter_input(INPUT_POST, "type");

if ($type == "resposta") {
    if ($questao->verificarAcerto($id_questao, $resposta)) {
        /*acertou*/
        $acertou = 1; /**TRUE */
        $pontos = 10;

        $questao->registrarResposta($id_questao, $id_usuario, $acertou, $pontos);
        $questao->atualizarPontos($id_usuario, $acertou);

        header("Location: ../pages/questoes.php");
    } else {
        header("Location: ../pages/questoes.php");
        $questao->registrarResposta($id_questao, $id_usuario, $acertou, $pontos);
    }
}


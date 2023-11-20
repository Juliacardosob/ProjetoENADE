<?php

class Questao{
    private $enunciado;
    private $num_questao;
    private $ano;
    private $descricao;
    private $fonte;
    private $alternativaA;
    private $alternativaB;
    private $alternativaC;
    private $alternativaD;
    private $alternativaE;
    private $correta;

    public function getEnunciado() {
        return $this->enunciado;
    }

    public function setEnunciado($enunciado) {
        $this->enunciado = $enunciado;
    }

    public function getNumQuestao() {
        return $this->num_questao;
    }

    public function setNumQuestao($num_questao) {
        $this->num_questao = $num_questao;
    }

    public function getAno() {
        return $this->ano;
    }

    public function setAno($ano) {
        $this->ano = $ano;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getFonte() {
        return $this->fonte;
    }

    public function setFonte($fonte) {
        $this->fonte = $fonte;
    }

    public function getAlternativaA() {
        return $this->alternativaA;
    }

    public function setAlternativaA($alternativaA) {
        $this->alternativaA = $alternativaA;
    }

    public function getAlternativaB() {
        return $this->alternativaB;
    }

    public function setAlternativaB($alternativaB) {
        $this->alternativaB = $alternativaB;
    }

    public function getAlternativaC() {
        return $this->alternativaC;
    }

    public function setAlternativaC($alternativaC) {
        $this->alternativaC = $alternativaC;
    }

    public function getAlternativaD() {
        return $this->alternativaD;
    }

    public function setAlternativaD($alternativaD) {
        $this->alternativaD = $alternativaD;
    }

    public function getAlternativaE() {
        return $this->alternativaE;
    }

    public function setAlternativaE($alternativaE) {
        $this->alternativaE = $alternativaE;
    }

    public function getCorreta() {
        return $this->correta;
    }

    public function setCorreta($correta) {
        $this->correta = $correta;
    }
}

interface IQuestaoDAO{
    public function criarQuestao(Questao $questao);

    public function editarQuestao($id_questao, Questao $questao);

    public function deletarQuestao($id_questao);

    public function buscarQuestao($id_questao);

    public function obterPontos($id_usuario, $acertou);

    public function atualizarPontos($id_usuario, $acertou);

    public function verificarAcerto($id_questao, $resposta);

    public function registrarResposta($id_questao, $id_usuario, $acertou, $pontos);

    public function buscarQuestoesNaoRespondidas($id_usuario);

    public function QuestoesRespondidas($id_usuario);

    public function questoesCertas($id_usuario);

    public function questoesErradas($id_usuario);

    public function taxaAcertos($id_usuario);
}


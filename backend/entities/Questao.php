<?php

class Questao{
    private $enunciado;
    private $num_questao;
    private $ano;
    private $descricao;
    private $font;
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

    public function getFont() {
        return $this->font;
    }

    public function setFont($font) {
        $this->font = $font;
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

    public function getQuestaoData() {
        $data = array(
            'num_questao' => $this->getNumQuestao(),
            'ano' => $this->getAno(),
            'descricao' => $this->getDescricao(),
            'font' => $this->getFont(),
            'enunciado' => $this->getEnunciado(),
            'alternativaA' => $this->getAlternativaA(),
            'alternativaB' => $this->getAlternativaB(),
            'alternativaC' => $this->getAlternativaC(),
            'alternativaD' => $this->getAlternativaD(),
            'alternativaE' => $this->getAlternativaE(),
            'correta' => $this->getCorreta(),
        );

        return $data;
    }
}

interface IQuestaoDAO{
    public function criarQuestao(Questao $questao);

    public function editarQuestao(Questao $questao);

    public function deletarQuestao($id);

    public function encontrarNumQuestao($num_questao);

}


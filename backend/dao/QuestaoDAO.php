<?php

require_once("../backend/entities/Questao.php");

class QuestaoDAO implements IQuestaoDAO
{

    private $Conn;

    public function __construct(PDO $conn)
    {
        $this->Conn = $conn;
    }

    public function criarQuestao(Questao $questao)
    {

        $questaoData = $questao->getQuestaoData();

        $stmt = $this->Conn->prepare("INSERT INTO questao(num_questao,
         ano,
         descricao,
         fonte,
         enunciado,
         alternativaA,
         alternativaB,
         alternativaC,
         alternativaD,
         alternativaE,
         respostaCorreta)
         VALUES(:num_questao,
         :ano,
         :descricao,
         :fonte,
         :enunciado,
         :alternativaA,
         :alternativaB,
         :alternativaC,
         :alternativaD,
         :alternativaE,
         :respostaCorreta)");

        $stmt->bindParam(':num_questao', $questaoData['num_questao']);
        $stmt->bindParam(':ano', $questaoData['ano']);
        $stmt->bindParam(':descricao', $questaoData['descricao']);
        $stmt->bindParam(':fonte', $questaoData['font']);
        $stmt->bindParam(':enunciado', $questaoData['enunciado']);
        $stmt->bindParam(':alternativaA', $questaoData['alternativaA']);
        $stmt->bindParam(':alternativaB', $questaoData['alternativaB']);
        $stmt->bindParam(':alternativaC', $questaoData['alternativaC']);
        $stmt->bindParam(':alternativaD', $questaoData['alternativaD']);
        $stmt->bindParam(':alternativaE', $questaoData['alternativaE']);
        $stmt->bindParam(':respostaCorreta', $questaoData['correta']);

        $stmt->execute();
    }

    public function editarQuestao(Questao $questao)
    {

        $questaoData = $questao->getQuestaoData();

        $stmt = $this->Conn->prepare("UPDATE questao SET
         num_questao = :num_questao,
         ano = :ano,
         descricao = :descricao,
         fonte = :fonte,
         enunciado = :enunciado,
         alternativaA = :alternativaA,
         alternativaB = :alternativaB,
         alternativaC = :alternativaC,
         alternativaD = :alternativaD,
         alternativaE = :alternativaE,
         respostaCorreta = :respostaCorreta
         WHERE id = :id

        ");

        $stmt->bindParam(':num_questao', $questaoData['num_questao']);
        $stmt->bindParam(':ano', $questaoData['ano']);
        $stmt->bindParam(':descricao', $questaoData['descricao']);
        $stmt->bindParam(':fonte', $questaoData['font']);
        $stmt->bindParam(':enunciado', $questaoData['enunciado']);
        $stmt->bindParam(':alternativaA', $questaoData['alternativaA']);
        $stmt->bindParam(':alternativaB', $questaoData['alternativaB']);
        $stmt->bindParam(':alternativaC', $questaoData['alternativaC']);
        $stmt->bindParam(':alternativaD', $questaoData['alternativaD']);
        $stmt->bindParam(':alternativaE', $questaoData['alternativaE']);
        $stmt->bindParam(':respostaCorreta', $questaoData['correta']);
        $stmt->bindParam(':id', $questaoData['id']);

        $stmt->execute();
    }

    public function deletarQuestao($id)
    {

        $stmt = $this->Conn->prepare("DELETE FROM questao WHERE id = :id");

        $stmt->bindParam(":id", $id);

        $stmt->execute();
    }

    public function encontrarNumQuestao($num_questao)
    {
        $stmt = $this->Conn->prepare("SELECT * FROM questao WHERE num_questao = :num_questao ");

        $stmt->bindParam(":num_questao", $num_questao);

        $stmt->execute();

        if($stmt->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }
}

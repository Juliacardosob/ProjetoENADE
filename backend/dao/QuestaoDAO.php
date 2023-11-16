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

        $stmt = $this->Conn->prepare("INSERT INTO questao(ano,
         descricao,
         descricao_fonte,
         enunciado,
         alternativaA,
         alternativaB,
         alternativaC,
         alternativaD,
         alternativaE,
         respostaCorreta)
         VALUES( :ano,
         :descricao,
         :descricao_fonte,
         :enunciado,
         :alternativaA,
         :alternativaB,
         :alternativaC,
         :alternativaD,
         :alternativaE,
         :respostaCorreta)");

        $stmt->bindParam(':ano', $questaoData['ano']);
        $stmt->bindParam(':descricao', $questaoData['descricao']);
        $stmt->bindParam(':descricao_fonte', $questaoData['fonte']);
        $stmt->bindParam(':enunciado', $questaoData['enunciado']);
        $stmt->bindParam(':alternativaA', $questaoData['alternativaA']);
        $stmt->bindParam(':alternativaB', $questaoData['alternativaB']);
        $stmt->bindParam(':alternativaC', $questaoData['alternativaC']);
        $stmt->bindParam(':alternativaD', $questaoData['alternativaD']);
        $stmt->bindParam(':alternativaE', $questaoData['alternativaE']);
        $stmt->bindParam(':respostaCorreta', $questaoData['correta']);

        $stmt->execute();
        header("Location: ../adm/inserirQuestoes.php");
    }

    public function editarQuestao(Questao $questao)
    {

        $questaoData = $questao->getQuestaoData();

        $stmt = $this->Conn->prepare("UPDATE questao SET
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

        $stmt->bindParam(':ano', $questaoData['ano']);
        $stmt->bindParam(':descricao', $questaoData['descricao']);
        $stmt->bindParam(':fonte', $questaoData['fonte']);
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

    public function deletarQuestao($id_questao)
    {

        $stmt = $this->Conn->prepare("DELETE FROM questao WHERE id = :id");

        $stmt->bindParam(":id", $id_questao, PDO::PARAM_INT);

        $stmt->execute();
    }

    public function registrarResposta($id_questao, $id_usuario, $acertou, $pontos){
        $stmt = $this->Conn->prepare("INSERT INTO resposta(id_questao, id_usuario, acertou, pontoQuestao) VALUE(:id_questao, :id_usuario, :acertou, :pontoQuestao)");

        $stmt->bindParam(":id_questao", $id_questao, PDO::PARAM_INT);
        $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
        $stmt->bindParam(":acertou", $acertou, PDO::PARAM_INT);
        $stmt->bindParam(":pontoQuestao", $pontos, PDO::PARAM_INT);

        $stmt->execute();
    }

    public function verificarAcerto($id_questao, $resposta){
        $stmt = $this->Conn->prepare("SELECT respostaCorreta FROM questao WHERE id_questao = :id_questao");

        $stmt->bindParam(":id_questao", $id_questao, PDO::PARAM_INT);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row["respostaCorreta"] == $resposta){
            return true;
        }
        else{
            return false;
        }
    }

    public function obterPontos($id_usuario, $acertou)
    {
        $stmt = $this->Conn->prepare("SELECT SUM(pontoQuestao) AS total FROM resposta WHERE id_usuario = :id_usuario AND acertou = :acertou");
        $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
        $stmt->bindParam(":acertou", $acertou, PDO::PARAM_INT);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado['total'];
    }

    public function atualizarPontos($id_usuario, $acertou)
    {

        $totalPontos = $this->obterPontos($id_usuario, $acertou);

        $stmt = $this->Conn->prepare("UPDATE usuario SET pontos = :totalPontos  WHERE id_usuario = :id_usuario");
    
        $stmt->bindParam(":totalPontos", $totalPontos, PDO::PARAM_INT);
        $stmt->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
    
        $stmt->execute();
    }
    

    public function buscarTodasQuestoes()
    {
        $stmt = $this->Conn->prepare("SELECT * FROM questao");

        $stmt->execute();

        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $row;
    }

    public function QuestoesRespondidas($id_usuario)
    {
        $stmt = $this->Conn->prepare("SELECT * FROM resposta WHERE id_usuario = :id_usuario");

        $stmt->bindParam(":id_usuario", $id_usuario);

        $stmt->execute();

        return $stmt->rowCount();
    }

    public function questoesCertas($id_usuario){
        $acertou = 1;

        $stmt = $this->Conn->prepare("SELECT * FROM resposta WHERE id_usuario = :id_usuario AND acertou = :acertou");

        $stmt->bindParam(":id_usuario", $id_usuario);
        $stmt->bindParam(":acertou", $acertou);

        $stmt->execute();

        return $stmt->rowCount();
    }

    public function questoesErradas($id_usuario){
        $acertou = 0;

        $stmt = $this->Conn->prepare("SELECT * FROM resposta WHERE id_usuario = :id_usuario AND acertou = :acertou");

        $stmt->bindParam(":id_usuario", $id_usuario);
        $stmt->bindParam(":acertou", $acertou);

        $stmt->execute();

        return $stmt->rowCount();
    }

    public function taxaAcertos($id_usuario)
    {
        $total = $this->QuestoesRespondidas($id_usuario);
        $acertos = $this->questoesCertas($id_usuario);


        if($total == 0){
            $total = 1;
        }
        $taxa = ($acertos * 100)/$total;
        $taxa = round($taxa);

        return $taxa;


    }
}

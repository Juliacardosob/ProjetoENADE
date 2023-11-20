<?php
require_once("../content/painel.php");
require_once("../backend/dao/QuestaoDAO.php");

$questoes = new QuestaoDAO($conn);

$todasQuestoes = $questoes->buscarTodasQuestoes();

?>
<main class="gerenciarQuestoes-container">
    <div class="ranking-table">
        <table class="table">
            <thead>
                <tr>
                    <th>Ano</th>
                    <th>Descricao</th>
                    <th>Fonte</th>
                    <th>Enunciado</th>
                    <th>Resposta correta</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($todasQuestoes as $questoes) : ?>
                    <tr>
                        <td><?= $questoes["ano"] ?></td>
                        <td><?= $questoes["descricao"] ?></td>
                        <td><?= $questoes["descricao_fonte"] ?></td>
                        <td><?= $questoes["enunciado"] ?></td>
                        <td><?= $questoes["respostaCorreta"] ?></td>
                        <td class="actions">
                            <a href="../adm/visualizarQuestao.php?id=<?= $questoes["id_questao"] ?>" class="actionslinks"><i class="material-icons">visibility</i></a>
                            <a href="../adm/editarQuestao.php?id=<?= $questoes["id_questao"] ?>" class="actionslinks"><i class="material-icons">edit</i></a>
                            <form action="../backend/bd_questoes.php" method="POST">
                                <input type="hidden" name="type" value="delete">
                                <input type="hidden" name="id" value="<?= $questoes["id_questao"] ?>">
                                <button class="actionslinks"><i class="material-icons">delete</i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div class="btnInserir-container">
        <a class="btnGerencia" href="inserirQuestoes.php"><i class="material-icons">control_point</i> Cadastar questões</a>
    </div>
</main>
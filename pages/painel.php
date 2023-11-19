<?php
require_once("../content/painel.php");
require_once("../backend/dao/QuestaoDAO.php");

$questoes = new QuestaoDAO($conn);

$ranking = new UserDAO($conn);

$questoesRespondidas = $questoes->QuestoesRespondidas($id);

$questoesAcertadas = $questoes->questoesCertas($id);

$questoesErradas = $questoes->questoesErradas($id);

$taxa = $questoes->taxaAcertos($id);

$rankingTop3 = $ranking->buscarTresMelhores();

$posicao3 = 1 ;

?>

<main id="painel-container">
    <div id="painelActions-container">
        <div class="painelActions">
            <i class="material-icons">account_circle</i>
            <p class="painelActions-text">Perfil</p>
        </div>
        <div class="painelActions">
            <i class="material-icons">format_list_bulleted</i>
            <p class="painelActions-text">Questões</p>
        </div>
        <div class="painelActions">
            <i class="material-icons">emoji_events</i>
            <p class="painelActions-text">Ranking</p>
        </div>
    </div>
    <div id="estatisticas">
        <div class="painelQuestoes-container">
            <div id="question-number">
                <h1 id="number"><?=$questoesRespondidas?></h1>
            </div>
            <p id="numberSubtitle">Questões Resolvidas</p>
            <small id="call">Vamos praticar?</small>
            <a href="../pages/questoes.php" id="btnQuestoes">Responder questões</a>
            <a href="../pages/ranking.php" id="btnQuestoes">Ver ranking</a>
        </div>
        <div class="painelCard-container">
            <div class="cardPainel">
                <p id="certas"><?=$questoesAcertadas?></p>
                <span>Certas</span>
                <span class="space"></span>
                <i id="certoCard" class="material-icons">check_circle_outline</i>
            </div>
            <div class="cardPainel">
                <p id="erradas"><?=$questoesErradas?></p>
                <span>Erradas</span>
                <span class="space"></span>
                <i id="erroCard" class="material-icons">highlight_off</i>
            </div>
            <div class="cardPainel">
                <p id="taxa"><?=$taxa?>%</p>
                <span>de acertos</span>
            </div>
        </div>
        <div class="painelRanking-container">
            <table id="ranking-table">
                <thead>
                    <tr>
                        <td>Ranking</td>
                        <td></td>
                        <td><i class="material-icons">emoji_events</i></td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($rankingTop3 as $top3) : ?>
                        <tr>
                            <td><?= $posicao3 ?>°</td>
                            <td class="img-td"><img class="img-table" src="../img/default.png" alt=""><a class="alunoNome" href="#"><?=$top3["nome"]?> <?= $top3["sobrenome"]?></a></td>
                            <td><?=$top3["pontos"]?></td>
                        </tr>
                    <?php $posicao3++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="painelNews-container">
        <div>
            <h2>Últimas novidades</h2>
        </div>
        <div class="painelNews-card">
            <div>
                <h3>Data do Enade</h3>
                <img id="painelNews-img" src="../img/enade-enade.jpg" alt="Descrição da imagem">
            </div>
            <div class="painelNewsCard-Elements">
                <p id="painelNews-text">A aplicação do ENADE ocorre ciclicamente, em um intervalo de três anos para cada área de conhecimento. Em 2021, foram avaliados os cursos das áreas de Ciências Sociais Aplicadas, Ciências Humanas, e áreas afins. No entanto, é importante ressaltar que o ENADE abrange diversas áreas do conhecimento, incluindo Engenharias, Saúde, Ciências Exatas, e outras, em diferentes edições.</p>
                <span class="space"></span>
                <button id="painelNews-button">Saber mais sobre o ENADE</button>
            </div>
        </div>
    </div>
</main>
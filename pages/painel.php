<?php
include_once("content/painel.php");
?>

<main id="painel-container">
    <div id="painelImage">
        <img id="painelimg" src="../img/enade-enade.jpg" alt="">
    </div>
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
                <h1 id="number">X</h1>
            </div>
            <p id="numberSubtitle">Questões Resolvidas</p>
            <small id="call">Vamos praticar?</small>
            <a href="../pages/topicos.php" id="btnQuestoes">Responder questões</a>
            <a href="../pages/ranking.php" id="btnQuestoes">Ver ranking</a>
        </div>
        <div class="painelCard-container">
            <div class="cardPainel">
                <p id="certas">X</p>
                <span>Certas</span>
                <span class="space"></span>
                <i id="certoCard" class="material-icons">check_circle_outline</i>
            </div>
            <div class="cardPainel">
                <p id="erradas">X</p>
                <span>Erradas</span>
                <span class="space"></span>
                <i id="erroCard" class="material-icons">highlight_off</i>
            </div>
            <div class="cardPainel">
                <p id="taxa">%</p>
                <span>Taxa de acertos</span>
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
                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                        <tr>
                            <td><?= $i ?>°</td>
                            <td class="img-td"><img class="img-table" src="../img/default.png" alt=""><a class="alunoNome" href="#">Nome do aluno</a></td>
                            <td>XXXX</td>
                        </tr>
                    <?php endfor; ?>
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
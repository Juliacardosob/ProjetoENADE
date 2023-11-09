<?php
include_once("../content/painel.php");
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
        <div class="cardVideo">
            <div class="cardVideo-header">
                <h3>Conheça o ENADE</h3>
            </div>
            <div class="cardVideo-body">
                <video width="100%" height="50%" controls>
                    <source src="caminho/do/seu/video.mp4" type="video/mp4">
                        Seu navegador não suporta o elemento de vídeo.
                    </video>
            </div>
    </div>
    </div>
</main>
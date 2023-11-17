<?php
require_once("../content/painel.php");
require_once("../backend/dao/UserDAO.php");

$ranking = new UserDAO($conn);

$pontosUsuario = $ranking->getPontos($id);

$rankingTop100 = $ranking->buscarCemMelhores();

$rankingTop3 = $ranking->buscarTresMelhores();

$posicao3 = 1 ;

$posicao100 = 1;
?>

<main id="ranking-container">
    <div class="title">
        <h1>Ranking</h1>
        <div class="Title-card">
            <p>Ranking do mês</p>
            <button class="BtnMes">Novembro</button>
            <button class="BtnMes">Outubro</button>
            <button class="BtnMes">Setembro</button>
        </div>
    </div>
    <div class="personal-stats">
        <div class="card">
            <p>Sua colocação</p>
            <div class="rank-number">
                <h1 id="rank">°</h1>
            </div>
        </div>
        <div class="card">
            <p>Seus pontos: </p>
            <div class="rank-number">
                <h1 id="rank"><?=$pontosUsuario?></h1>
            </div>
        </div>
        <div class="card">
            <p>Todos os pontos são zerados no primeiro dia do mês.
                Sua pontuação no ranking será atualizada todo dia, caso seus pontos ainda não tenham sido computados, aguarde :)
                Questões respondidas certas = 10 pontos.</p>
        </div>
    </div>
    <div id="top-ranked-form">
        <?php foreach($rankingTop3 as $top3) : ?>
            <div class="top-ranked-box">
                <div class="top-ranked-img">
                    <img src="../img/default.png">
                    <div class="top-ranked-number">
                        <p><?=$posicao3?></p>
                    </div>
                </div>
                <p class="top-ranked-name"><?=$top3["nome"]?></p>
                <div class="top-ranked-status">
                    <div class="top-ranked-points">
                        <p class="points"><?=$top3["pontos"]?></p>
                        <p class="top-ranked-subtitle">Pontos</p>
                    </div>
                    <div class="top-ranked-points">
                        <p class="points"> <?=$posicao3;?>°</p>
                        <p class="top-ranked-subtitle">Posição</p>
                    </div>
                </div>
            </div>
        <?php $posicao3++; endforeach; ?>
    </div>
    <div class="ranking-table">
        <table id="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th class="space"></th>
                    <th>Pontos</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rankingTop100 as $top100):?>
                <tr>
                    <td><?=$posicao100;?></td>
                    <td class="img-td"><img class="img-table" src="../img/default.png" alt=""><?=$top100["nome"]?></td>
                    <td class="space"></td>
                    <td><?=$top100["pontos"]?></td>
                </tr>
                <?php $posicao100++; endforeach;?>
            </tbody>
        </table>
    </div>
</main>
<?php
require_once("../content/footer.php")
?>
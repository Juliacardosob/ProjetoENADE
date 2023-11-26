<?php
require_once("../content/painel.php");
require_once("../backend/dao/UserDAO.php");

$ranking = new UserDAO($conn);

$Usuario = $ranking->getDados($id);

$rankingTop100 = $ranking->buscarCemMelhores();

$rankingTop3 = $ranking->buscarTresMelhores();

$posicao3 = 1;

$posicao100 = 1;
?>

<main id="ranking-container">
    <div class="title">
        <h1>Ranking</h1>
    </div>
    <?php if ($adm == false) : ?>
        <div class="personal-stats">
            <div class="card">
                <p>Seus pontos: </p>
                <div class="rank-number">
                    <h1 id="rank"><?= $Usuario["pontos"] ?></h1>
                </div>
            </div>
            <div class="card">
                <p>Todos os pontos são zerados no primeiro dia do mês.
                    Sua pontuação no ranking será atualizada todo dia, caso seus pontos ainda não tenham sido computados, aguarde :)
                    Questões respondidas certas = 1 ponto.</p>
            </div>
        </div>
    <?php endif ?>
    <div id="top-ranked-form">
        <?php foreach ($rankingTop3 as $top3) : ?>
            <div class="top-ranked-box">
                <div class="top-ranked-img">
                    <img src="../img/fotos_perfil/<?=$top3["foto"]?>">
                    <div class="top-ranked-number">
                        <p><?= $posicao3 ?></p>
                    </div>
                </div>
                <p class="top-ranked-name"><?= $top3["nome"] ?> <?= $top3["sobrenome"] ?></p>
                <div class="top-ranked-status">
                    <div class="top-ranked-points">
                        <p class="points"><?= $top3["pontos"] ?></p>
                        <p class="top-ranked-subtitle">Pontos</p>
                    </div>
                    <div class="top-ranked-points">
                        <p class="points"> <?= $posicao3; ?>°</p>
                        <p class="top-ranked-subtitle">Posição</p>
                    </div>
                </div>
            </div>
        <?php $posicao3++;
        endforeach; ?>
    </div>
    <div class="ranking-table">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th class="img-td">Nome</th>
                    <th class="space"></th>
                    <th>Pontos</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rankingTop100 as $top100) : ?>
                    <tr>
                        <td><?= $posicao100; ?></td>
                        <td class="img-td"><img class="img-table" src="../img/fotos_perfil/<?=$top100["foto"]?>" alt=""><?= $top100["nome"] ?> <?= $top100["sobrenome"] ?></td>
                        <td class="space"></td>
                        <td><?= $top100["pontos"] ?></td>
                    </tr>
                <?php $posicao100++;
                endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<?php
require_once("../content/footer.php")
?>
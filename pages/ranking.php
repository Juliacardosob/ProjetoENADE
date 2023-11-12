<?php
include_once("../content/painel.php");
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
                <h1 id="rank">6°</h1>
            </div>
        </div>
        <div class="card">
            <p>Seus pontos: </p>
            <div class="rank-number">
                <h1 id="rank">10</h1>
            </div>
        </div>
        <div class="card">
            <p>Todos os pontos são zerados no primeiro dia do mês.
                Sua pontuação no ranking será atualizada todo dia, caso seus pontos ainda não tenham sido computados, aguarde :)
                Questões respondidas certas = 10 pontos.</p>
        </div>
    </div>
    <div id="top-ranked-form">
        <?php for ($i = 1; $i <= 3; $i++) : ?>
            <div class="top-ranked-box">
                <div class="top-ranked-img">
                    <img src="../img/default.png">
                    <div class="top-ranked-number">
                        <p><?= $i; ?>°</p>
                    </div>
                </div>
                <p class="top-ranked-name">Nome do Aluno</p>
                <div class="top-ranked-status">
                    <div class="top-ranked-points">
                        <p class="points">XXXXX</p>
                        <p class="top-ranked-subtitle">Pontos</p>
                    </div>
                    <div class="top-ranked-points">
                        <p class="points"> X°</p>
                        <p class="top-ranked-subtitle">Posição</p>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
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
                <?php for($i = 1; $i <= 100; $i++):?>
                <tr>
                    <td><?= $i;?></td>
                    <td class="img-td"><img class="img-table" src="../img/default.png" alt=""> Nome do aluno</td>
                    <td class="space"></td>
                    <td>XXXX</td>
                </tr>
                <?php endfor;?>
            </tbody>
        </table>
    </div>
</main>
<?php
include_once("../content/footer.php")
?>
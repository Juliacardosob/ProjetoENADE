<?php
include_once("../content/body.php");
?>

<div id="banner">
    <div id="info-banner">
        <p>Teste seu conhecimento</p>
        <h1>Melhor plataforma de estudos para o ENADE</h1>
        <a href="login.php" id="btnBanner"><button>Entrar para começar<i class="material-icons">arrow_right</i></button></a>
    </div>
    <img src="../img/estudante.png" alt="" id="estudanteImg">
</div>
<main id="index-container">
    <div id="index-content">
        <div class="content">
            <div id="Text-content">
                <div id="index-title">
                    <h1>Bem-vindo ao centro de estudos para o ENADE</h1>
                    <h3>Veja o que abordamos em nosso banco de questões</h3>
                </div>
                <div id="content-icons">
                    <div class="content-icons">
                        <img src="../img/react.png" alt="" id="cards-img">
                        <p>Ciência da Computação</p>
                    </div>
                    <div class="content-icons">
                        <img src="../img/programacao.png" alt="" id="cards-img">
                        <p>Lógica de Programação</p>
                    </div>
                    <div class="content-icons">
                        <img src="../img/hardware.png" alt="" id="cards-img">
                        <p>Estrutura de Computadores</p>
                    </div>
                </div>
                <div id="indexImg-container">
                    <img src="../img/group.png" alt="" class="indexImg">
                    <img src="../img/student.png" alt="" class="indexImg">
                </div>
            </div>
            <aside id="aside-content">
                <div class="aside-cards">
                    <i class="material-icons">cached</i>
                    <div class="asideCards-txt">
                        <h2>Pratique, reforce e teste os seus conhecimentos</h2>
                        <p>Mais de XXX questões do Enade</p>
                    </div>
                </div>
                <div class="aside-cards">
                    <i class="material-icons">checklist</i>
                    <div class="asideCards-txt">
                        <h2>Saiba tuuudo e arrase</h2>
                        <p>Conteúdo completo para reforçar seu conhecimento e arrasar no Enade</p>
                    </div>
                </div>
                <div class="aside-cards">
                    <i class="material-icons">edit_note</i>
                    <div class="asideCards-txt">
                        <h2>Fique por dentro de tudo sobre o Enade</h2>
                        <p>Conteúdos que mais caem no Enade</p>
                    </div>
                </div>
                <div class="aside-cards">
                    <i class="material-icons">portrait</i>
                    <div class="asideCards-txt">
                        <h2>Acompanhe o seu desempenho</h2>
                        <p>Acerte questões e cresça sua posição do ranking de estudantes</p>
                    </div>
                </div>
                <div id="button-container">
                    <a href="login.php"><button>Comece a estudar</button></a>
                </div>
            </aside>
        </div>
        <div class="content">
            <div class="cards-container">
                <i class="material-icons">menu_book</i>
                <div class="cardsText">
                    <h1>Estude em casa</h1>
                    <p>Acessível de qualquer aparelho, nossa plataforma é perfeita para estudar on-line.</p>
                </div>
            </div>
            <div class="cards-container">
                <i class="material-icons">sports_esports</i>
                <div class="cardsText">
                    <h1>Se divirta estudando</h1>
                    <p>Ganhe pontos ao acertar questões e participe do ranking.
                    </p>
                </div>
            </div>
            <div class="cards-container">
                <i class="material-icons">groups</i>
                <div class="cardsText">
                    <h1>Acompanhe amigos</h1>
                    <p>Tenha acesso ao progresso de seus amigos e se motivem para alcançar bons resultados.</p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
include_once("../content/footer.php");
?>
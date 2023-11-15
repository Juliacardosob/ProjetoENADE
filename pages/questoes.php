<?php
require_once("../content/painel.php");
require_once("../backend/contabilizaquestao.php");
?>
<main>
    <div class="title">
        <h1>Questões de {{Nome da materia}} - {{Nome do topico}}</h1>
    </div>
    <div class="questoes-container">
        <div class="questoes-title">
            <p class="questoesTitle">Questão {{numero da questao}}</p>
            <p class="questoesSubTitle">Enade{{ano da prova}}/{{num da prova}}</p>
        </div>
        <hr>
        <div class="questoes-content">
            <p class="questao">A etapa de definição de requisitos é voltada para estabelecer quais as funções são requeridas pelo sistema e as restrições sobre a operação e o desenvolvimento do software. Os requisitos de software podem ser classificados como requisitos funcionais e não funcionais.</p>
            <small class="questao-font">SOMMERVILLE, I. Engenharia de Software, 10.
                ed. São Paulo: Pearson Education, 2019 (adaptado).</small>
            <p class="questao-enunciado">Considerando as informações do texto, assinale a alternativa em que o item é um requisito funcional.</p>
        </div>
        <div class="alternativas">
            <form method="POST">
                <label class="alternativas-card">
                    <input class="opcaoRadio" type="radio" name="alternativa" value="a">
                    <p>A&rpar; O software deve ser operacionalizado no sistema Linux.</p>
                </label>
                <label class="alternativas-card">
                    <input class="opcaoRadio" type="radio" name="alternativa" value="b">
                    <p>B&rpar; O tempo de desenvolvimento não deve ultrapassar seis meses.</p>
                                            
                </label>
                <label class="alternativas-card">
                    <input class="opcaoRadio" type="radio" name="alternativa" value="c">
                    <p>C&rpar; O software deve emitir relatórios de compras a cada quinze dias.</p>
                </label>
                <label class="alternativas-card">
                    <input class="opcaoRadio" type="radio" name="alternativa" value="d">
                    <p>D&rpar; O tempo de resposta do sistema não deve ultrapassar 30 segundos.</p>
                </label>
                <label class="alternativas-card">
                    <input class="opcaoRadio" type="radio" name="alternativa" value="e">
                    <p>E&rpar; A base de dados deve ser protegida para acesso apenas de usuários autorizados.</p>
                </label>
                <button class="btnResponder" name="btnResponder">Responder</button>
            </form>
        </div>
    </div>
</main>
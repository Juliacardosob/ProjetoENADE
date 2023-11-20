<?php
require_once("../content/painel.php");
require_once("../backend/dao/UserDAO.php");

$alunos = new UserDAO($conn);

$todosAlunos = $alunos->buscarTodos();

?>


<main class="gerenciarQuestoes-container">
    <div class="ranking-table">
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Apelido</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($todosAlunos as $aluno) : ?>
                    <tr>
                        <td><?= $aluno["nome"] ?></td>
                        <td><?= $aluno["sobrenome"] ?></td>
                        <td><?= $aluno["apelido"] ?></td>
                        <td><?= $aluno["email"] ?></td>
                        <td class="actions">
                            <a href="../adm/visualizarUsuario.php?id=<?= $aluno["id_usuario"] ?>" class="actionslinks"><i class="material-icons">visibility</i></a>
                            <form action="../backend/bd_usuario.php" method="POST">
                                <input type="hidden" name="type" value="delete">
                                <input type="hidden" name="id" value="<?= $aluno["id_usuario"] ?>">
                                <button class="actionslinks"><i class="material-icons">delete</i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</main>
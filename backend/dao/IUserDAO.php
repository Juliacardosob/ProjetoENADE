<?php
require_once("../backend/entities/User.php");
require_once("../backend/entities/UserEdit.php");

interface IUserDAO{
    public function cadastrarAluno(User $user);

    public function verificarCadastrado($usuario, $senha);

    public function verificarAdmin($usuario, $senha);

    public function atualizarCadastro($id, User $user);

}
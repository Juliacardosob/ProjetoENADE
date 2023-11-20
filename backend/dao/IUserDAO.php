<?php
require_once("../backend/entities/User.php");

interface IUserDAO
{
    public function cadastrarAluno(User $user);

    public function buscarAluno($id_usuario);
    
    public function deletarAluno($id_usuario);

    public function verificarCadastrado($usuario, $senha);

    public function verificarAdmin($usuario, $senha);

    public function atualizarCadastro($id, User $user);

    public function cadastrarAdmin(User $admin);

    public function getDados($id_usuario);

    public function buscarCemMelhores();
    
    public function buscarTresMelhores();
}

<?php
include_once("../backend/entities/User.php");
interface IUserDAO{
    public function Cadastrar(User $user);

    public function verificarCadastrado($usuario);

    public function verificarAdmin($usuario, $senha);

    public function verificarUsuario($usuario, $senha);

}
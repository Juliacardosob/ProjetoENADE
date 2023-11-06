<?php
include_once("../entities/User.php");
interface IUserDAO{
    public function create(User $user);

    public function findUser($usuario, $senha);
}
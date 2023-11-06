<?php
include_once("../models/IUserDAO.php");

class UserDAO implements IUserDAO{
    public function create(User $user){}

    public function findUser($usuario, $senha){}
}

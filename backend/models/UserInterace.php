<?php

interface IUser{

    public function setUsuario($usuario);

    public function getUsuario();

    public function setSenha($senha);
    
    public function getSenha();

    public function setEmail($email);
    
    public function getEmail();

    public function setFoto($foto);
    
    public function getFoto();

    public function verificarSenha($senha, $confirme);
}
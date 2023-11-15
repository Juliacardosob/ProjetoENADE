<?php

interface IUser{

    public function setUsuario($usuario);

    public function getUsuario();

    public function setSenha($senha);

    public function setPrimeiroNome($primeiroNome);

    public function getPrimeiroNome();

    public function setUltimoNome($ultimoNome);

    public function getUltimoNome();

    public function getFullName($primeiroNome, $ultimoNome);

    public function generateToken();
    
    public function getSenha();

    public function setEmail($email);
    
    public function getEmail();

    public function setFoto($foto);
    
    public function getFoto();

    public function verificarSenha($senha, $confirme);
}
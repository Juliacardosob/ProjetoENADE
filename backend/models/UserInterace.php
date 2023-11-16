<?php

interface IUser{

    public function setApelido($apelido);

    public function getApelido();

    public function setSenha($senha);

    public function setNome($nome);

    public function getNome();

    public function setSobrenome($sobrenome);

    public function getSobrenome();

    public function generateToken();
    
    public function getSenha();

    public function setEmail($email);
    
    public function getEmail();

    public function setFoto($foto);
    
    public function getFoto();

    public function verificarSenha($senha, $confirme);
}
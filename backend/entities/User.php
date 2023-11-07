<?php

include_once("../backend/models/UserInterace.php");

class User implements IUser{

    private $Usuario;
    private $Senha;
    private $Email;
    private $Foto;

    public function setUsuario($usuario){
        $this->Usuario = $usuario;
    }

    public function getUsuario(){
        return $this->Usuario;
    }

    public function setSenha($senha){
        $this->Senha = $senha;
    }
    
    public function getSenha(){
        return $this->Senha;
    }

    public function setEmail($email){
        $this->Email = $email;
    }
    
    public function getEmail(){
        return $this->Email;
    }

    public function setFoto($foto){
        $this->Foto = $foto;
    }
    
    public function getFoto(){
        return $this->Foto;
    }
}


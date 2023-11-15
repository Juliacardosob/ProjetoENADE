<?php

include_once("backend/models/UserInterace.php");

class User implements IUser
{

    private $Id;
    private $token;
    private $primeiroNome;
    private $ultimoNome;
    private $Apelido;
    private $Senha;
    private $Email;
    private $Foto;

    public function setPrimeiroNome($primeiroNome){
        $this->primeiroNome = $primeiroNome;
    }

    public function getPrimeiroNome(){
        return $this->primeiroNome;
    }

    public function generateToken(){
        return bin2hex(random_bytes(50));
    }

        
    public function setUltimoNome($ultimoNome){
        $this->ultimoNome = $ultimoNome;
    }

    public function getUltimoNome(){
        return $this->ultimoNome;
    }

    public function getFullName($primeiroNome, $ultimoNome)
    {
        return $this->primeiroNome . " " . $this->ultimoNome;
    }
    

    public function setUsuario($usuario)
    {
        $this->Apelido = $usuario;
    }

    public function getUsuario()
    {
        return $this->Apelido;
    }

    public function setSenha($senha)
    {
        $this->Senha = $senha;
    }

    public function getSenha()
    {
        return $this->Senha;
    }

    public function setEmail($email)
    {
        $this->Email = $email;
    }

    public function getEmail()
    {
        return $this->Email;
    }

    public function setFoto($foto)
    {
        $this->Foto = $foto;
    }

    public function getFoto()
    {
        return $this->Foto;
    }

    public function verificarSenha($senha, $confirme)
    {
        if ($senha == $confirme) {
            return true;
        } else {
            return false;
        }
    }

}

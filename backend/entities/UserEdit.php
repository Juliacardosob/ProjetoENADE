<?php

require_once("../backend/models/UserInterace.php");

class UserEdit
{
    private $Usuario;
    private $Senha;
    private $Email;
    private $Foto;

    public function setUsuario($usuario)
    {
        if (!empty($usuario)) {
            $this->Usuario = $usuario;
        } else {
            $this->Usuario = $_SESSION['usuario'];
        }
    }
    public function getUsuario()
    {
        return $this->Usuario;
    }

    public function setSenha($senha)
    {
        if (!empty($senha)) {
            $this->Senha = password_hash($senha, PASSWORD_DEFAULT);
        } else {
            $this->Senha = $_SESSION['senha'];
        }
    }

    public function getSenha()
    {
        return $this->Senha;
    }

    public function setEmail($email)
    {
        if (!empty($email)) {
            $this->Email = $email;
        } else {
            $this->Email = $_SESSION['email'];
        }
    }

    public function getEmail()
    {
        return $this->Email;
    }

    public function setFoto($foto)
    {
        if (!empty($foto)) {
            $this->Foto = $foto;
        } else {
            $this->Foto = $_SESSION['foto'];
        }
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

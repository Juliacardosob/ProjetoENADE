<?php

require_once("../backend/models/UserInterace.php");

class User implements IUser
{
    public $id;
    public $token;
    public $nome;
    public $sobrenome;
    public $apelido;
    public $senha;
    public $email;
    public $foto;

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function generateToken()
    {
        return bin2hex(random_bytes(50));
    }

    public function generateImageName() {
        return bin2hex(random_bytes(60)) . ".jpg";
      }


    public function setSobrenome($sobrenome)
    {
        $this->sobrenome = $sobrenome;
    }

    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    public function setApelido($apelido)
    {
        $this->apelido = $apelido;
    }

    public function getApelido()
    {
        return $this->apelido;
    }

    public function setSenha($senha)
    {
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    public function getFoto()
    {
        if (empty($foto)) {
            return $foto = "default.png";
        } else {
            return $this->foto = $foto;
        }
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

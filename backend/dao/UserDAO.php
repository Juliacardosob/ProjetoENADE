<?php

require_once("IUserDAO.php");

class UserDAO implements IUserDAO
{
    private $Conn;

    public function __construct(PDO $conn)
    {
        $this->Conn = $conn;
    }

    public function verificarCadastrado($usuario)
    {
        $stmt = $this->Conn->prepare("SELECT * FROM aluno WHERE apelido = :usuario");

        $stmt->bindParam(":usuario", $usuario);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function verificarAdmin($usuario, $senha)
    {
        $stmt = $this->Conn->prepare("SELECT * FROM administrador WHERE nome = :nome and senha= :senha");

        $stmt->bindParam(":nome", $usuario);
        $stmt->bindParam(":senha", $senha);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() > 0 && password_verify($senha, $row["senha"])) {
            return true;
        } else {
            return false;
        }
    }

    public function verificarUsuario($usuario, $senha)
    {
        $stmt = $this->Conn->prepare("SELECT * FROM aluno WHERE usuario = :usuario");

        $stmt->bindParam(":usuario", $usuario);

        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);


        if ($stmt->rowCount() > 0 && password_verify($senha, $row["senha"])) {
            $this->definirVariaveisSessao($usuario, $row["foto"], $row["id"], $row["senha"], $row["email"]);
            return true;
        } else {
            return false;
        }
    }

    public function cadastrarAluno(User $user)
    {
        $stmt = $this->Conn->prepare("INSERT INTO aluno (token, primeiroNome, ultimoNome, senha, email, foto, apelido) VALUES (:token, :primeiroNome, :ultimoNome, :senha, :email, :foto, :apelido)");

        $token = $user->generateToken();
        $primeiroNome = $user->getPrimeiroNome();
        $ultimoNome = $user->getUltimoNome();
        $senhaHash = password_hash($user->getSenha(), PASSWORD_DEFAULT);
        $email = $user->getEmail();
        $foto = $user->getFoto();
        $apelido = $user->getApelido();

        $stmt->bindParam(":token", $token);
        $stmt->bindParam(":primeiroNome", $primeiroNome);
        $stmt->bindParam(":ultimoNome", $ultimoNome);
        $stmt->bindParam(":senha", $senhaHash);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":foto", $foto);
        $stmt->bindParam(":apelido", $apelido);

        $stmt->execute();
    }

    public function cadastrarAdmin(User $admin)
    {

        $stmt = $this->Conn->prepare("INSERT INTO administrador (nome, senha, email, foto) VALUES (:usuario, :senha, :email, :foto)");

        $usuario = $admin->getUsuario();
        $email = $admin->getEmail();
        $foto = $admin->getFoto();
        $senhaHash = password_hash($admin->getSenha(), PASSWORD_DEFAULT);

        $stmt->bindParam(":usuario", $usuario);
        $stmt->bindParam(":senha", $senhaHash);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":foto", $foto);

        $stmt->execute();
    }

    public function atualizarCadastro($id, UserEdit $user)
    {

        $stmt = $this->Conn->prepare("UPDATE aluno SET usuario = :usuario, email = :email, senha = :senha, foto = :foto WHERE id = :id");

        $usuario = $user->getUsuario();
        $email = $user->getEmail();
        $foto = $user->getFoto();
        $senha = $user->getSenha();

        $stmt->bindParam(":usuario", $usuario);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":senha", $senha);
        $stmt->bindParam(":foto", $foto);
        $stmt->bindParam(":id", $id);

        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() > 0) {
            $this->definirVariaveisSessao($usuario, $foto, $id, $email);
        } else {
            $_SESSION['msg'] = "Erro ao atualizar ";
        }
    }

    private function definirVariaveisSessao($usuario, $foto, $id, $email)
    {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['foto'] = $foto;
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $id;
    }
}

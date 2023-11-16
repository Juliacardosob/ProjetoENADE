<?php

require_once("IUserDAO.php");

class UserDAO implements IUserDAO
{
    private $Conn;

    public function __construct(PDO $conn)
    {
        $this->Conn = $conn;
    }

    public function verificarCadastrado($apelido, $senha)
    {
        $stmt = $this->Conn->prepare("SELECT * FROM usuario WHERE apelido = :apelido");

        $stmt->bindParam(":apelido", $apelido);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() > 0) {
            if (password_verify($senha, $row["senha"])) {
                $this->definirVariaveisSessao($apelido, $row["foto"], $row["id_usuario"], $row["email"], $row["pontos"]);
                header("Location: ../pages/painel.php");
                return true; /**Senha correta */
            }
            else{
                return false; /**Senha incorreta */
            }
        } else {
            return false;
            /**Usuário não cadastrado */
        }
    }

    public function verificarAdmin($usuario, $senha)
    {
        $stmt = $this->Conn->prepare("SELECT * FROM administrador WHERE nome = :nome and senha= :senha");

        $stmt->bindParam(":nome", $usuario);
        $stmt->bindParam(":senha", $senha);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() > 0) {
            if(password_verify($senha, $row["senha"])){
                return true;
            }
            else{
                return false; /**Senha incorreta */
            }
        } else {
            return false;
            /**Não cadastrado */
        }
    }


    public function cadastrarAluno(User $user)
    {
        $stmt = $this->Conn->prepare("INSERT INTO usuario ( nome, sobrenome, email, senha, foto, apelido) VALUES ( :nome, :sobrenome, :email, :senha, :foto, :apelido)");

        $nome = $user->getNome();
        $sobrenome = $user->getSobrenome();
        $email = $user->getEmail();
        $senhaHash = password_hash($user->getSenha(), PASSWORD_DEFAULT);
        $foto = $user->getFoto();
        $apelido = $user->getApelido();

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":sobrenome", $sobrenome);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":senha", $senhaHash);
        $stmt->bindParam(":foto", $foto);
        $stmt->bindParam(":apelido", $apelido);

        $stmt->execute();
    }

    public function cadastrarAdmin(User $admin)
    {

        $stmt = $this->Conn->prepare("INSERT INTO administrador (nome, senha, email, foto) VALUES (:nome, :senha, :email, :foto)");


        $nome = $admin->getNome();
        $email = $admin->getEmail();
        $foto = $admin->getFoto();
        $senhaHash = password_hash($admin->getSenha(), PASSWORD_DEFAULT);

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":senha", $senhaHash);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":foto", $foto);

        $stmt->execute();
    }

    public function atualizarCadastro($id, User $user)
    {

        $stmt = $this->Conn->prepare("UPDATE usuario SET nome = :nome, email = :email, senha = :senha, foto = :foto WHERE id = :id");

        $nome = $user->getNome();
        $email = $user->getEmail();
        $senha = $user->getSenha();
        $foto = $user->getFoto();

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":senha", $senha);
        $stmt->bindParam(":foto", $foto);
        $stmt->bindParam(":id", $id);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $this->definirVariaveisSessao($nome, $foto, $id, $email);
        } else {
            $_SESSION['msg'] = "Erro ao atualizar ";
        }
    }

    public function getPontos($id_usuario){
        $stmt = $this->Conn->prepare("SELECT pontos FROM usuario WHERE id_usuario = :id_usuario");
        
        $stmt->bindParam(":id_usuario", $id_usuario);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['pontos'];
    }

    public function buscarCemMelhores(){
        $stmt = $this->Conn->prepare("SELECT * FROM usuario ORDER BY pontos DESC LIMIT 100");

        $stmt->execute();

        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $row;
    }

    public function buscarTresMelhores(){
        $stmt = $this->Conn->prepare("SELECT * FROM usuario ORDER BY pontos DESC LIMIT 3");

        $stmt->execute();

        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $row;
    }

    private function definirVariaveisSessao($nome, $foto, $id, $email)
    {
        $_SESSION['nome'] = $nome;
        $_SESSION['foto'] = $foto;
        $_SESSION['email'] = $email;
        $_SESSION['id_usuario'] = $id;
    }
}

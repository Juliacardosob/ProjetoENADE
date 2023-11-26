<?php

require_once("IUserDAO.php");

class UserDAO implements IUserDAO
{
    private $Conn;
    private $ADM = false;

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
                $this->definirVariaveisSessao($row["id_usuario"], $this->ADM);
                header("Location: ../pages/painel.php");
                return true;
            } else {
                return false;

                $_SESSION["msg"] = "Senha incorreta";
                $_SESSION["type"] = "Error";
            }
        } else {
            return false;
            $_SESSION["msg"] = "Usuário não cadastrado";
            $_SESSION["type"] = "Error";
        }
    }

    public function verificarUsuario($apelido)
    {


        $stmt = $this->Conn->prepare("SELECT * FROM usuario WHERE apelido = :apelido");

        $stmt->bindParam(":apelido", $apelido);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
            /**Usuario encontrado */
        } else {
            return false;

            /**Usuario não encontrado */
        }
    }

    public function verificarAdmin($usuario, $senha)
    {
        if ($usuario == "admin" && $senha == "123456") {
            header("Location: ../adm/cadastrarADM.php");
        } else {
            
        $stmt = $this->Conn->prepare("SELECT * FROM administrador WHERE apelido = :apelido");

        $stmt->bindParam(":apelido", $usuario);
        
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() > 0) {
            if (password_verify($senha, $row["senha"])) {
                $this->ADM = true;
                header("Location: ../pages/painel.php");
                $this->definirVariaveisSessao($row["id_adm"], $this->ADM);
                return true;
            } else {
                return false;
                /*Senha incorreta*/
            }
        } else {
            $this->ADM = false;
            return false;
            /**Não cadastrado */
        }
    }
}


    public function cadastrarAluno(User $user)
    {
        $stmt = $this->Conn->prepare("INSERT INTO usuario ( nome, sobrenome, email, senha, foto, apelido) VALUES ( :nome, :sobrenome, :email, :senha, :foto, :apelido)");

        $nome = $user->getNome();
        $sobrenome = $user->getSobrenome();
        $email = $user->getEmail();
        $senha = $user->getSenha();
        $foto = $user->getFoto();
        $apelido = $user->getApelido();

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":sobrenome", $sobrenome);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":senha", $senha);
        $stmt->bindParam(":foto", $foto);
        $stmt->bindParam(":apelido", $apelido);

        $stmt->execute();
    }

    public function cadastrarAdmin(User $admin)
    {

        $stmt = $this->Conn->prepare("INSERT INTO administrador (nome, sobrenome, email, senha, apelido, foto) VALUES (:nome, :sobrenome, :email, :senha,  :apelido, :foto)");


        $nome = $admin->getNome();
        $sobrenome = $admin->getSobrenome();
        $email = $admin->getEmail();
        $senha = $admin->getSenha();
        $apelido = $admin->getApelido();
        $foto = $admin->getFoto();


        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":sobrenome", $sobrenome);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":senha", $senha);
        $stmt->bindParam(":apelido", $apelido);
        $stmt->bindParam(":foto", $foto);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function atualizarCadastro($id, User $user)
    {

        $stmt = $this->Conn->prepare("UPDATE usuario SET nome = :nome, sobrenome = :sobrenome, email = :email, apelido = :apelido WHERE id_usuario = :id");

        $nome = $user->getNome();
        $sobrenome = $user->getSobrenome();
        $email = $user->getEmail();
        $usuario = $user->getApelido();

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":sobrenome", $sobrenome);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":apelido", $usuario);
        $stmt->bindParam(":id", $id);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $this->definirVariaveisSessao($id, $this->ADM);
        } else {
            $_SESSION['msg'] = "Erro ao atualizar ";
        }
    }

    public function atualizarSenha($id, User $user)
    {

        $stmt = $this->Conn->prepare("UPDATE usuario SET senha = :senha WHERE id_usuario = :id");

        $senha = $user->getSenha();

        $stmt->bindParam(":senha", $senha);
        $stmt->bindParam(":id", $id);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            ;
        } else {
            $_SESSION['msg'] = "Erro ao atualizar ";
        }
    }

    public function atualizarFoto($id, $foto){

        $stmt = $this->Conn->prepare("UPDATE usuario SET foto = :foto WHERE id_usuario = :id");

        $stmt->bindParam(":foto", $foto);
        $stmt->bindParam(":id", $id);

        $stmt->execute();
    }

    public function getDados($id_usuario)
    {
        $stmt = $this->Conn->prepare("SELECT * FROM usuario WHERE id_usuario = :id_usuario");

        $stmt->bindParam(":id_usuario", $id_usuario);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    public function getDadosADM($id_usuario)
    {
        $stmt = $this->Conn->prepare("SELECT * FROM administrador WHERE id_adm = :id_usuario");

        $stmt->bindParam(":id_usuario", $id_usuario);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    public function buscarTresMelhores()
    {
        $stmt = $this->Conn->prepare("SELECT * FROM usuario ORDER BY pontos DESC LIMIT 3");

        $stmt->execute();

        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $row;
    }

    public function buscarCemMelhores()
    {
        $stmt = $this->Conn->prepare("SELECT * FROM usuario ORDER BY pontos DESC LIMIT 100");

        $stmt->execute();

        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $row;
    }

    public function buscarTodos()
    {
        $stmt = $this->Conn->prepare("SELECT * FROM usuario");
        
        $stmt->execute();

        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $row;
    }

    public function buscarAluno($id_usuario)
    {
        $stmt = $this->Conn->prepare("SELECT * FROM usuario WHERE id_usuario = :id");

        $stmt->bindParam(":id", $id_usuario);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    public function deletarAluno($id_usuario)
    {
        $stmt = $this->Conn->prepare("DELETE FROM usuario WHERE id_usuario = :id");

        $stmt->bindParam(":id", $id_usuario);

        $stmt->execute();
    }

    private function definirVariaveisSessao($id, $ADM)
    {
        $_SESSION["id_usuario"] = $id;
        $_SESSION["adm"] = $ADM;
    }
}

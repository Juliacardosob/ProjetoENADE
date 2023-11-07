<?php
include_once("../backend/models/IUserDAO.php");

class UserDAO implements IUserDAO
{
    private $Conn;

    public function __construct(PDO $conn)
    {
        $this->Conn = $conn;
    }

    public function verificarCadastrado($usuario)
    {

        $stmt = $this->Conn->prepare("SELECT * FROM aluno WHERE usuario = :usuario");

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

        $stmt = $this->Conn->prepare("SELECT * FROM administrador WHERE usuario = :usuario and senha= :senha");

        $stmt->bindParam(":usuario", $usuario);
        $stmt->bindParam(":senha", $senha);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() > 0 && $senha == $row["senha"]) {
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
            $this->definirVariaveisSessao($usuario, $row["foto"]);
            return true;
        } else {
            return false;
        }
    }

    public function Cadastrar(User $user)
    {

        $stmt = $this->Conn->prepare("INSERT INTO aluno (usuario, senha, email_inst, foto) VALUES (:usuario, :senha, :email, :foto)");

        $usuario = $user->getUsuario();
        $email = $user->getEmail();
        $foto = $user->getFoto();
        $senhaHash = password_hash($user->getSenha(), PASSWORD_DEFAULT);

        $stmt->bindParam(":usuario", $usuario);
        $stmt->bindParam(":senha", $senhaHash);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":foto", $foto);

        $stmt->execute();
    }

    private function definirVariaveisSessao($usuario, $foto) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['foto'] = $foto;
    }
}

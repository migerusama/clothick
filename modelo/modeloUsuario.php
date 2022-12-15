<?php

require_once "connection.php";
require_once "modeloDatos.php";
require_once "usuario.php";
class ModeloUsuario
{
    private $conn;

    public function __construct()
    {
        $this->conn = Connection::getConnection();
    }

    public function login($nick, $password)
    {
        $sql = "SELECT US.id as id, US.nick as nick, US.email as email, US.imagen as imagen,
                US.tipo as idTipo, T.descripcion as tipo FROM usuario US
                INNER JOIN password P ON US.id=P.id
                INNER JOIN tipo T ON US.tipo=T.id
                WHERE ";
        $sql .= str_contains($nick, '@') ? "US.email " : "US.nick ";
        $sql .= "LIKE ? AND P.passwd LIKE ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $nick, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        $u = $result->fetch_assoc();
        return new Usuario($u["id"], $u["nick"], new Tipo($u["idTipo"]), $u["email"]);
    }

    public function register($user)
    {
        if (!$this->checkValid($user)) return false;
        else {
            $user = $this->insert($user);

            $sql = "INSERT INTO password (id_usr,password) VALUES (?,?)";
            $stmt = $this->conn->prepare($sql);

            $id = $user->getId();
            $pass = $user->getPassword();

            $stmt->bind_param("is", $id, $pass);
            $stmt->execute();

            $mod = new ModeloDatos();
            $mod->insert($user->getDatos());
        }
    }

    public function select($id)
    {
        $sql = "SELECT * FROM usuarios WHERE id=?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $u = $result->fetch_assoc();
        return new Usuario($u["id"], $u["nick"], $u["email"], $u["tipo"]);
    }

    public function insert($user)
    {
        if (!$this->checkValid($user)) return false;
        else {
            $sql = "INSERT INTO usuarios (nick,tipo,email) VALUES (?,?,?)";
            $stmt = $this->conn->prepare($sql);

            $userArray = array_values((array) $user);
            $tipo = $userArray[3]->getId();

            $stmt->bind_param("sis", $userArray[1], $tipo, $userArray[2],);
            $stmt->execute();

            if (!empty($stmt->error_list)) return false;
            else {
                $user->setId($stmt->insert_id);
                return $user;
            }
        }
    }

    public function update($user)
    {
        if ($this->checkValid($user)) return false;
        else {
            $sql = "UPDATE usuarios (nick,tipo,email) VALUES (?,?,?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sis", $user->getNick(), $user->getTipo()->getId(), $user->getEmail());
            $stmt->execute();
            return empty($stmt->error);
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM usuarios WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return empty($stmt->error);
    }

    private function checkValid($user)
    {
        $sql = "SELECT * FROM usuarios WHERE nick=? OR email=?";
        $stmt = $this->conn->prepare($sql);

        $nick = $user->getNick();
        $email = $user->getEmail();

        $stmt->bind_param("ss", $nick, $email);
        $stmt->execute();

        return $stmt->get_result()->num_rows == 0;
    }
}

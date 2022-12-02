<?php

require_once "connection.php";
class ModeloUsuario
{
    private $conn;

    public function __construct()
    {
        $this->conn = Connection::getConnection();
    }

    public function login($nick, $password)
    {
        if (str_contains($nick, '@')) {
            $sql = "SELECT US.id as id, US.nick as nick, US.email as email, US.imagen as imagen,
                US.tipo as idTipo, T.descripcion as tipo FROM usuario US
                INNER JOIN password P ON US.id=P.id
                INNER JOIN tipo T ON US.tipo=T.id
                WHERE US.email LIKE ? AND P.passwd LIKE ?";
        } else {
            $sql = "SELECT US.id as id, US.nick as nick, US.email as email, US.imagen as imagen,
                US.tipo as idTipo, T.descripcion as tipo FROM usuario US
                INNER JOIN password P ON US.id=P.id
                INNER JOIN tipo T ON US.tipo=T.id
                WHERE US.nick LIKE ? AND P.passwd LIKE ?";
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $nick, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        $u = $result->fetch_assoc();
        return new Usuario($u["id"], $u["nick"], new Tipo($u["idTipo"]), $u["email"]);
    }

    public function select($id)
    {
        $sql = "SELECT * FROM usuarios WHERE id=?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $u = $result->fetch_assoc();
        return new Usuario($u["id"], $u["nick"], $u["tipo"]);
    }

    public function insert($user)
    {
        if ($this->checkValid($user)) {
            $sql = "INSERT INTO usuarios (nick,tipo,email) VALUES (?,?,?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sis", $user->getNick(), $user->getTipo()->getId(), $user->getEmail());
            $stmt->execute();
            if (empty($stmt->error)) {
                $user->setId($stmt->insert_id);
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function update($user)
    {
        if (!$this->checkValid($user)) {
            $sql = "UPDATE usuarios (nick,tipo,email) VALUES (?,?,?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sis", $user->getNick(), $user->getTipo()->getId(), $user->getEmail());
            $stmt->execute();
            return empty($stmt->error);
        } else {
            return false;
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
        $stmt->bind_param("ss", $user->getNick(), $user->getEmail());
        $stmt->execute();
        return empty($stmt->get_result());
    }
}

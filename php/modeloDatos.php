<?php
class ModeloDatos
{
    private $conn;

    public function __construct()
    {
        $this->conn = Connection::getConnection();
    }

    public function select($id)
    {
        $sql = "SELECT * FROM datos WHERE idUser=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function insert($datos)
    {
        $sql = "INSERT INTO datos VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(
            "isssssssiib",
            $datos->getId(),
            $datos->getName(),
            $datos->getLastName(),
            $datos->getSex(),
            $datos->getDateBirth(),
            $datos->getAddress(),
            $datos->getCountry(),
            $datos->getCreditCard(),
            $datos->getNotifications(),
            $datos->getNewsletter(),
            $datos->getProfilePic()
        );
        $stmt->execute();
        return empty($stmt->error_list);
    }
}

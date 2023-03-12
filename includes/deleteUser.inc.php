<?php

include_once 'dbh.inc.php';

if (isset($_GET["id"])) {
    $conn = Connection::getConnection();

    $id = $_GET["id"];

    $query = "DELETE FROM password WHERE idUser = ?;";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $query = "DELETE FROM userdata WHERE idUser = ?;";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $query = "DELETE FROM users WHERE id = ?;";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();


    header("location: ../admin/admin.php?admin=users");
}

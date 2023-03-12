<?php

include_once 'dbh.inc.php';

if (isset($_GET["id"])) {
    $conn = Connection::getConnection();

    $id = $_GET["id"];

    $query = "DELETE FROM products WHERE id = ?;";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("location: ../admin/admin.php?admin=products");
}

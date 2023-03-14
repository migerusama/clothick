<?php

include_once 'dbh.inc.php';
session_start();
if ($_SESSION['userType'] == 2) {
    if (isset($_POST["pQuantity"])) {
        $conn = Connection::getConnection();
        $id = $_POST["id"];
        $pQuantity = $_POST["pQuantity"];
        $pPrice = $_POST["pPrice"];
        $query = "UPDATE products SET quantity = ?, price = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("idi", $pQuantity, $pPrice, $id);
        $stmt->execute();

        header("location: ../admin/admin.php?admin=products");
    }
} else {
    header("location: ../home/home.php");
}

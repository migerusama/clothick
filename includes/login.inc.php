<?php
if (isset($_POST["login-submit"])) {
    include_once "dbh.inc.php";
    include_once "functions.inc.php";
    $conn = Connection::getConnection();
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];

    if (checkEmptyValuesLogin($uid, $pwd) !== false) {
        header("location: ../home/login.php?error=emptyFields");
        exit(); // para el script
    }
    logInUser($conn, $uid, $pwd);
} else {
    header("location: ../home/login.php?error=submitFailed");
    exit();
}

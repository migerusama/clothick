<?php
if (isset($_POST['signup-submit'])) {

    include_once 'dbh.inc.php';
    include_once 'functions.inc.php';
    $conn = Connection::getConnection();
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    if (checkEmptyValuesLogin($uid, $pwd) !== false) {
        header('location: ../home/home.php?error=emptyFields');
        exit(); // para el script
    }
    logInUser($conn, $uid, $pwd);
} else {
    header('location: ../home/home.php?error=emptyFields');
    exit();
}

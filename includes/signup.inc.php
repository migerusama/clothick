<?php
if (isset($_POST['signup-submit'])) {

    include_once 'dbh.inc.php';
    include_once 'functions.inc.php';
    $conn = Connection::getConnection();
    $signupName = $_POST['signupName'];
    $signupNick = $_POST['signupNick'];
    $signupEmail = $_POST['signupEmail'];
    $signupPwd = $_POST['signupPwd'];
    $signupRepwd = $_POST['signupRepwd'];

    if (checkEmptyValuesSignUp($signupName, $signupNick, $signupEmail, $signupPwd, $signupRepwd) !== false) {
        header('location: ../signup/signup.php?error=emptyFields');
        exit(); // para el script
    }

    if (invalidEmail($signupEmail) !== false) {
        header('location: ../signup/signup.php?error=invalidEmail');
        exit(); // para el script
    }
    if (matchPwd($signupPwd, $signupRepwd) !== false) {
        header('location: ../signup/signup.php?error=invalidEmail');
        exit(); // para el script
    }
    if (uidExists($conn, $signupNick, $signupEmail) !== false) {
        header('location: ../signup/signup.php?error=invalidEmail');
        exit(); // para el script
    }
    signupUser($conn, $signupName, $signupNick, $signupEmail, $signupPwd);
} else {
    header('location: ../signup/login.php?error=submitFailed');
    exit();
}

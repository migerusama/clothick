<?php
function checkEmptyValues($name, $email, $uid, $pwd, $pwdRepeat)
{
    $result = null;
    if (empty($name) || empty($email) || empty($uid) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    } else $result = false;
    return $result;
}
function checkEmptyValuesLogin($uid, $pwd)
{
    $result = null;
    if (empty($uid) || empty($pwd)) {
        $result = true;
    } else $result = false;
    return $result;
}
function invalidUid($uid)
{
    $result = null;

    if (!preg_match("/^[a-zA-Z0-9]*$/", $uid)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}
function invalidEmail($email)
{
    $result = null;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}
function matchPwd($pwd, $pwdRepeat)
{
    $result = null;
    if ($pwd !== $pwdRepeat) $result = true;
    else $result = false;
    return $result;
}
function uidExists($conn, $uid, $email)
{
    $sql = 'SELECT US.id as id, US.nick as nick,
    US.email as email, P.id_usr as userIdPassword,P.password as userPassword FROM usuarios US
    INNER JOIN password P ON US.id=P.id_usr
    INNER JOIN tipo T ON US.tipo=T.id 
    WHERE nick = ? OR email = ?;';
    $stmt = mysqli_stmt_init($conn);
    $result = null;
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: ../home/home.php?error=stmtFailed');
        exit(); // para el script
    }
    mysqli_stmt_bind_param($stmt, "ss", $uid, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function logInUser($conn, $uid, $pwd)
{
    $username = uidExists($conn, $uid, $pwd);
    if ($username === false) {
        header('location: ../home/home.php?error=wrongLogin');
        exit(); // para el script
    }

    $userDbPwd = $username['userPassword'];
    $checkpwd = $pwd === $userDbPwd;
    if ($userDbPwd === false) {
        header('location: ../home/home.php?error=wrongPass');
        exit(); // para el script
    } else if ($checkpwd === true) {
        session_start();
        $_SESSION['userid'] = $username['id'];
        $_SESSION['useruid'] = $username['nick'];
        header('location: ../home/home.php?error=LogginSuccess');
        exit();
    }
}

function createUser($conn, $name, $email, $uid, $pwd)
{
    $sql = "INSERT INTO users (userName,userEmail,userUid,userPwd) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: signup.inc.php?error=stmtFailed');
        exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $uid, $hashedPwd);
    mysqli_stmt_execute($stmt);
}

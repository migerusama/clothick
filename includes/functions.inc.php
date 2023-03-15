<?php
function checkEmptyValues($name, $email, $uid, $pwd, $pwdRepeat)
{
    $result = null;
    if (
        empty($name) ||
        empty($email) ||
        empty($uid) ||
        empty($pwd) ||
        empty($pwdRepeat)
    ) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function checkEmptyValuesLogin($uid, $pwd)
{
    $result = null;
    if (empty($uid) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function checkEmptyValuesContact($contactName, $contactEmail, $contactText)
{
    $result = null;
    if (empty($contactName) || empty($contactEmail) || empty($contactText)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function checkEmptyValuesSignUp(
    $signupName,
    $signupNick,
    $signupEmail,
    $signupPwd,
    $signupRepwd
) {
    $result = null;
    if (
        empty($signupName) ||
        empty($signupNick) ||
        empty($signupEmail) ||
        empty($signupPwd) ||
        empty($signupRepwd)
    ) {
        $result = true;
    } else {
        $result = false;
    }
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
    if ($pwd !== $pwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $uid, $email)
{
    $sql = 'SELECT US.id as id,US.type as userType, US.nick as nick,
    US.email as email, P.idUser as userIdPassword,P.password
    as userPassword, D.name as fullname,D.gender as gender,D.dateBirth as datebirth,D.address
    as address,D.country as country, D.profilePic as pfp FROM users US
    INNER JOIN password P ON US.id=P.idUser
    INNER JOIN userdata D on US.id = D.idUser
    WHERE nick = ? OR email = ?;';

    $stmt = mysqli_stmt_init($conn);
    $result = null;

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../login/login.php?error=stmtFailed");
        exit();
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
    $username = uidExists($conn, $uid, $uid);
    if ($username === false) {
        header("location: ../login/login.php?error=wrongLogin");
        exit();
    }
    $userDbPwd = $username["userPassword"];
    $checkpwd = password_verify($pwd, $userDbPwd);
    if ($checkpwd === false) {
        header("location: ../login/login.php?error=wrongPass");
        exit();
    } elseif ($checkpwd === true) {
        session_start();
        $_SESSION["userid"] = $username["id"];
        $_SESSION["useruid"] = $username["nick"];
        $_SESSION["fullname"] = $username["fullname"];
        $_SESSION["email"] = $username["email"];
        $_SESSION["gender"] = $username["gender"];
        $_SESSION["datebirth"] = $username["datebirth"];
        $_SESSION["country"] = $username["country"];
        $_SESSION["address"] = $username["address"];
        $_SESSION["pfp"] = $username["pfp"];
        $_SESSION["userType"] = $username["userType"];
        header("location: ../home/home.php");
        exit();
    }
}

function saveTicket($conn, $contactName, $contactEmail, $contactText)
{
    $sql = "INSERT INTO contact (fullname,email,description) VALUES (?,?,?);";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $contactName, $contactEmail, $contactText);
    $stmt->execute();
}

function signupUser(
    $conn,
    $signupName,
    $signupNick,
    $signupEmail,
    $signupPassword
) {
    $sql = "INSERT INTO users (nick,type,email) VALUES (?,?,?)";
    $userType = 1;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis", $signupNick, $userType, $signupEmail);
    $stmt->execute();
    $result = $stmt->insert_id;

    $sql = "INSERT INTO userdata (idUser,name) VALUES (?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $result, $signupName);
    $stmt->execute();

    $sql = "INSERT INTO password (idUser,password) VALUES (?,?)";
    $stmt = $conn->prepare($sql);
    $hashedPassword = password_hash($signupPassword, PASSWORD_DEFAULT); // hash de la contraseña
    $stmt->bind_param("is", $result, $hashedPassword);
    $stmt->execute();

    $username = uidExists($conn, $signupNick, $signupNick);
    session_start();

    $_SESSION["userid"] = $username["id"];
    $_SESSION["useruid"] = $username["nick"];
    $_SESSION["fullname"] = $username["fullname"];
    $_SESSION["email"] = $username["email"];
    $_SESSION["gender"] = $username["gender"];
    $_SESSION["datebirth"] = $username["datebirth"];
    $_SESSION["country"] = $username["country"];
    $_SESSION["address"] = $username["address"];
    $_SESSION["userType"] = $username["userType"];
    $_SESSION["pfp"] = $username["pfp"];
    header("location: ../home/home.php");
}

function updateData(
    $conn,
    $userId,
    $profileUserName,
    $profileAddress,
    $profileGender,
    $profileCounty,
    $profileBirthDay,
    $image
) {
    $sql = "UPDATE userdata INNER JOIN users ON userdata.idUser = users.id SET userdata.name = ?,
     userdata.gender = ?, userdata.dateBirth = ?, userdata.address = ?, userdata.country = ?,
      userdata.profilePic = ? WHERE users.id = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ssssssi",
        $profileUserName,
        $profileGender,
        $profileBirthDay,
        $profileAddress,
        $profileCounty,
        $image,
        $userId
    );
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $_SESSION["fullname"] = $profileUserName;
        $_SESSION["gender"] = $profileGender;
        $_SESSION["datebirth"] = $profileBirthDay;
        $_SESSION["country"] = $profileCounty;
        $_SESSION["address"] = $profileAddress;
        $_SESSION["pfp"] = $image;
        return true; // Se realizaron cambios
    } else {
        return false; // No se realizaron cambios
    }
}

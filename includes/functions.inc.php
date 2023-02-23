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
function checkEmptyValuesContact($contactName, $contactEmail, $contactText)
{
    $result = null;
    if (empty($contactName) || empty($contactEmail) || empty($contactText))  {
        $result = true;
    } else $result = false;
    return $result;
}
function checkEmptyValuesSignUp($signupName, $signupNick, $signupEmail,$signupPwd,$signupRepwd)
{
    $result = null;
    if (empty($signupName) || empty($signupNick) || empty($signupEmail) || empty($signupPwd) || empty($signupRepwd) )  {
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
    $sql = 'SELECT US.id as id,T.id as userType, US.nick as nick,
    US.email as email, P.idUser as userIdPassword,P.password
    as userPassword, D.name as fullname,D.sex as sex,D.dateBirth as datebirth,D.address
    as useraddress,D.country as country, D.profilePic as pfp FROM usuarios US
    INNER JOIN password P ON US.id=P.idUser
    INNER JOIN tipo T ON US.tipo=T.id 
    INNER JOIN datos D on US.id = D.idUser
    WHERE nick = ? OR email = ?;';
    $stmt = mysqli_stmt_init($conn);
    $result = null;
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: ../home/login.php?error=stmtFailed');
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
        header('location: ../home/login.php?error=wrongLogin');
        exit(); // para el script
    }
    $userDbPwd = $username['userPassword'];
    $checkpwd = $pwd === $userDbPwd;
    if ($checkpwd === false) {
        header('location: ../home/login.php?error=wrongPass');
        exit(); // para el script
    } else if ($checkpwd === true) {
        session_start();
        $_SESSION['userid'] = $username['id'];
        $_SESSION['useruid'] = $username['nick'];
        $_SESSION['fullname'] = $username['fullname'];
        $_SESSION['email'] = $username['email'];
        $_SESSION['sex'] = $username['sex'];
        $_SESSION['datebirth'] = $username['datebirth'];
        $_SESSION['country'] = $username['country'];
        $_SESSION['address'] = $username['address'];
        $_SESSION['pfp'] = $username['profilePic'];
        $_SESSION['userType'] = $username['userType'];
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

function saveTicket($conn, $contactName, $contactEmail, $contactText){

    $sql = "INSERT INTO contact (fullname,email,description) VALUES (?,?,?);";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss',$contactName,$contactEmail,$contactText);
    $stmt->execute();
    header('location: ../home/home.php?error=consultaGuardada');
    
}

function signupUser($conn,$signupName,$signupNick,$signupEmail,$signupPassword){
    $sql = "INSERT INTO usuarios (nick,tipo,email) VALUES (?,?,?)";
    $userType = 1;
    $stmt =$conn->prepare($sql);
    $stmt->bind_param('sis',$signupNick,$userType,$signupEmail);
    $stmt->execute();
    $result = $stmt->insert_id;

    $sql = "INSERT INTO datos (idUser,name) VALUES (?,?)";
    $stmt =$conn->prepare($sql);
    $stmt->bind_param('is',$result,$signupName);
    $stmt->execute();

    $sql = "INSERT INTO password (idUser,password) VALUES (?,?)";
    $stmt =$conn->prepare($sql);
    $stmt->bind_param('is',$result,$signupPassword);
    $stmt->execute();

    $username = uidExists($conn, $signupNick, $signupPassword);
    session_start();
    $_SESSION['userid'] = $username['id'];
    $_SESSION['useruid'] = $username['nick'];
    $_SESSION['fullname'] = $username['fullname'];
    $_SESSION['email'] = $username['email'];
    $_SESSION['sex'] = $username['sex'];
    $_SESSION['datebirth'] = $username['datebirth'];
    $_SESSION['country'] = $username['country'];
    $_SESSION['address'] = $username['address'];
    $_SESSION['pfp'] = $username['profilePic'];
    header('location: ../home/home.php?error=signupSuccessfull');
}

function checkUsernameChange($profileUserName){
    return $profileUserName != $_SESSION['fullname'];
}
function checkEmailChange($profileEmail){
    return ($profileEmail == $_SESSION['email']) ? true : false;
}
function checkAddressChange($profileAddress){
    return ($profileAddress == $_SESSION['address']) ? true : false;
}
function checkCountryChange($profileCounty){
    return ($profileCounty == $_SESSION['country']) ? true : false;
}
function checkBirthdayChange($profileBirthDay){
    return ($profileBirthDay == $_SESSION['datebirth']) ? true : false;
}
function changeName($conn, $currentName, $userId) {
    $sql = "UPDATE datos SET name = ? WHERE idUser = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $currentName, $userId);
    $stmt->execute();
    
  }
  
  

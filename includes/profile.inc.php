<?php
if (isset($_POST['saveProfileSubmit'])) {
    session_start();
    include_once 'dbh.inc.php';
    include_once 'functions.inc.php';
    $conn = Connection::getConnection();
    $userId = $_SESSION['userid'];

    //Current User Data
    $currentName = $_SESSION['fullname'];
    $currentGender = $_SESSION['gender'];
    $currentBirthday = $_SESSION['datebirth'];
    $currentCountry = $_SESSION['country'];
    $currentAddress = $_SESSION['address'];
    $currentPfp = $_SESSION['pfp'];

    // New Form Values
    $profileUserName = $_POST['profileUserName']; //Form Full Name
    $profileAddress = $_POST['profileAddress']; //Form Address
    $profileGender = $_POST['profileGender']; //Form Address
    $profileCounty = $_POST['profileCountry']; //Form Country
    $profileBirthDay = $_POST['profileBirthDay']; //Form BirthDay




    if (isset($_FILES['profilePicture']) && $_FILES['profilePicture']['error'] === 0) {
        // Código a ejecutar si se ha enviado un archivo
        if ($_FILES['profilePicture']['error'] == UPLOAD_ERR_OK) {
            // Obtener la imagen cargada
            $image = file_get_contents($_FILES['profilePicture']['tmp_name']);
        }
    } else {
        $image = $currentPfp;
    }


    if (
        $currentName == $profileUserName &&
        $currentGender == $profileGender &&
        $currentBirthday == $profileBirthDay &&
        $currentCountry == $profileCounty &&
        $currentAddress == $profileAddress &&
        $image == $currentPfp
    ) {
        // No changes
        unset($_SESSION['editProfileSubmit']);
        header('location: ../home/profile.php');
    } else {
        // Changes Made
        updateData($conn, $userId, $profileUserName, $profileAddress, $profileGender, $profileCounty, $profileBirthDay, $image);
        unset($_SESSION['editProfileSubmit']);
        header('location: ../home/profile.php');
    }
}

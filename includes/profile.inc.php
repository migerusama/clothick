<?php
if (isset($_POST['saveProfileSubmit'])) {
session_start();
include_once 'dbh.inc.php';
include_once 'functions.inc.php';
$conn = Connection::getConnection();
$userId = $_SESSION['userid'];
$currentName = $_SESSION['fullname'];
$currentEmail = $_SESSION['email'];
$currentSex = $_SESSION['sex'];
$currentBirthday = $_SESSION['datebirth'];
$currentCountry = $_SESSION['country'];
$currentAddress = $_SESSION['address'];
$profileUserName = $_POST['profileUserName'];
$profileEmail = $_POST['profileEmail'];
$profileAddress = $_POST['profileAddress'];
$profileCounty = $_POST['profileCounty'];
$profileBirthDay = $_POST['profileBirthDay'];

if (checkUsernameChange($profileUserName) !== false){
    changeName($conn,$profileUserName,$userId);
    $_SESSION['fullname'] = $profileUserName ;
    header("location: ../home/profile.php?error=Suses");
    exit();
}else{
    unset($_SESSION['editProfileSubmit']);
    header('location: ../home/profile.php?error=SameName');
}

}
?>
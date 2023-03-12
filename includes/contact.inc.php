<?php
if (isset($_POST['contact-submit'])) {

    include_once 'dbh.inc.php';
    include_once 'functions.inc.php';
    $conn = Connection::getConnection();
    $contactName = $_POST['contactName'];
    $contactEmail = $_POST['contactEmail'];
    $contactText = $_POST['contactText'];

    if (checkEmptyValuesContact($contactName, $contactEmail, $contactText) !== false) {
        header('location: ../home/contact.php?error=emptyFields');
        exit();
    }
    if (invalidEmail($contactEmail) !== false) {
        header('location: ../home/contact.php?error=invalidEmail');
        exit(); // para el script
    }
    saveTicket($conn, $contactName, $contactEmail, $contactText);
    session_start();
    $_SESSION['contactSuccess'] = true;
    header('location: ../home/contact.php');
} else {
    header('location: ../home/home.php?error=submitFailed');
    exit();
}

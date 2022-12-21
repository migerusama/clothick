<?php

ini_set("display_errors", 1);

require_once '../../php/modeloUsuario.php';
require_once '../../php/modeloDatos.php';

$name = $_POST['nameSur'];
$nick = $_POST['nick'];
$email = $_POST['email'];
$password = $_POST['password'];
$sex = $_POST['sex'];
$birthDate = $_POST['birth-date'];
$address = $_POST['address'];
$country = $_POST['country'];
$creditCard = $_POST['creditCard'];
$notifications = $_POST['notifications'];
$news = $_POST['news'];

$modUser = new ModeloUsuario();
$modData = new ModeloDatos();
$data = new Datos(array(
    "name" => explode(" ", $name)[0],
    "lastName" => explode(" ", $name)[1],
    "sex" => $sex,
    "dateBirth" => $dateBirth,
    "address" => $address,
    "country" => $country,
    "creditCard" => $creditCard,
    "notifications" => $notifications,
    "newsletter" => $newsletter
));
$user = new Usuario(null, $nick, $email, 1, $password, $data);

var_dump($user);

if ($modUser->register($user)) {
?>
    <!-- <script>
        parent.location.href = 'http://localhost/clothick/home/home.html';
    </script> -->
<?php
} else {
} ?>
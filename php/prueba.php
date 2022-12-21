<?php

ini_set("display_errors", 1);

require_once "modeloUsuario.php";

$mod = new ModeloUsuario();
$data = new Datos(array(
    "name" => "",
    "lastName" => "",
));
$mod->register(new Usuario(null, "miguel", "", 1, "contraseña", $data));

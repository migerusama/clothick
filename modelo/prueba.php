<?php

ini_set("display_errors", 1);

require_once "modeloUsuario.php";

$mod = new ModeloUsuario();
$mod->register(new Usuario(null, "miguel", "", 1, "contraseña"));

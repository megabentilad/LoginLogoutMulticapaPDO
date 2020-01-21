<?php
/*Totalmente basado (por no decir copiado) en David*/
include_once 'core/ValidaForms.php';

include_once 'model/BDPDO.php';
include_once 'model/Usuario.php';
include_once 'model/UsuarioPDO.php';

//Hacemnos estos arrays para facilitar la comprensión del código
$controladores = [
    "inicio" => "controller/cInicio.php",
    "login" => "controller/cLogin.php",
    "registro" => "controller/cRegistro.php",
    "miCuenta" => "controller/cMiCuenta.php"
];

$vistas = [
    "layout" => "view/Layout.php",
    "inicio" => "view/vInicio.php",
    "login" => "view/vLogin.php",
    "registro" => "view/vRegistro.php",
    "miCuenta" => "view/vMiCuenta.php"
];
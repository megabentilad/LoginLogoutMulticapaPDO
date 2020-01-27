<?php
/*Totalmente basado (por no decir copiado) en David*/
include_once 'core/ValidaForms.php';

include_once 'model/BDPDO.php';
include_once 'model/Usuario.php';
include_once 'model/UsuarioPDO.php';
include_once 'model/Departamento.php';
include_once 'model/DepartamentoPDO.php';

//Hacemnos estos arrays para facilitar la comprensión del código
$controladores = [
    "inicio" => "controller/cInicio.php",
    "login" => "controller/cLogin.php",
    "registro" => "controller/cRegistro.php",
    "miCuenta" => "controller/cMiCuenta.php",
    "mtoDepartamentos" => "controller/cMtoDepartamentos.php",
    "mtoUsuarios" => "controller/cMtoUsuarios.php",
    "borrarCuenta" => "controller/cBorrarCuenta.php",
    "altaDepartamento" => "controller/cAltaDepartamento.php",
    "consultarModificarDepartamento" => "controller/cConsultarModificarDepartamento.php",
    "eliminarDepartamento" => "controller/cEliminarDepartamento.php",
    "consultarModificarUsuario" => "controller/cConsultarModificarUsuario.php",
    "eliminarUsuario" => "controller/cEliminarUsuario.php"
];

$vistas = [
    "layout" => "view/Layout.php",
    "inicio" => "view/vInicio.php",
    "login" => "view/vLogin.php",
    "registro" => "view/vRegistro.php",
    "miCuenta" => "view/vMiCuenta.php",
    "mtoDepartamentos" => "view/vMtoDepartamentos.php",
    "mtoUsuarios" => "view/vMtoUsuarios.php",
    "borrarCuenta" => "view/vBorrarCuenta.php",
    "altaDepartamento" => "view/vAltaDepartamento.php",
    "consultarModificarDepartamento" => "view/vConsultarModificarDepartamento.php",
    "eliminarDepartamento" => "view/vEliminarDepartamento.php",
    "consultarModificarUsuario" => "view/vConsultarModificarUsuario.php",
    "eliminarUsuario" => "view/vEliminarUsuario.php"
];
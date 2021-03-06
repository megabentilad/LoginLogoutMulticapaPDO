<?php
/**
 * Documento de la aconfiguración (Modelo).
 *
 * Documento de la configuración que incluye todo el código en cada recarga de la página.
 * @author Luis Mateo Rivera Uriarte
 * @version 1.0
 * @package POO-LMR
 */
/*Totalmente basado (por no decir copiado) en David*/

define("APIPROPIA", "http://daw215.sauces.local/proyectoDWES/loginLogoutPOO/api/apiREST.php?codigo="); //desarrollo
//define("APIPROPIA", "http://daw215.sauces.es/api/apiREST.php?codigo=");  //explotación

include_once 'core/ValidaForms.php';

include_once 'model/BDPDO.php';
include_once 'model/Usuario.php';
include_once 'model/UsuarioPDO.php';
include_once 'model/Departamento.php';
include_once 'model/DepartamentoPDO.php';
include_once 'model/REST.php';
include_once 'model/Pokemon.php';

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
    "eliminarUsuario" => "controller/cEliminarUsuario.php",
    "rest" => "controller/cREST.php",
    "restPropio" => "controller/cRESTPropio.php"
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
    "eliminarUsuario" => "view/vEliminarUsuario.php",
    "rest" => "view/vREST.php",
    "restPropio" => "view/vRESTPropio.php"
];
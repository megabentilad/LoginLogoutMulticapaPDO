<?php
/**
 * Useless function
 * 
 * Soy un fichero, jopé
 * @package POO-LMR
 * @author Luis Mateo Rivera Uriarte
 */
if(isset($_REQUEST['pagina'])){
    $_SESSION['DAW215LLPaginaAnterior'] = $_SESSION['DAW215LLPagina'];
    $_SESSION['DAW215LLPagina'] =  $_REQUEST['pagina'];
    header("Location: index.php");
    exit;
}

    if (isset($_POST['enviar'])) { //Si se ha pulsado enviar
        DepartamentoPDO::bajaFisicaDepartamento($_SESSION['DAW215LoginLogoutPOODepartamento']->getCodDepartamento());
        $_SESSION['DAW215LLPagina'] = "mtoDepartamentos";
        header("Location: index.php");
        exit;  
    }

$vista = $vistas[$_SESSION['DAW215LLPagina']]; //guarda la variable para que el layout sepa que mostrar
$_SESSION['DAW215LLPOOtituloPagina'] = ucfirst($_SESSION['DAW215LLPagina']); //Sirve para la cabecera
require_once $vistas["layout"]; //muesto el layout con el login cómo base

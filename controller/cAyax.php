<?php
/**
 * Useless function
 * 
 * Soy un fichero, jopé
 * @package POO-LMR
 * @author Luis Mateo Rivera Uriarte
 */
session_start();
if(isset($_REQUEST['buscaDescripcion']) && isset($_SESSION['DAW215LoginLogoutPOOUsuario'])){
    //Incluimos los ficheros necesarios
    include_once '../model/DepartamentoPDO.php';
    include_once '../config/ConfDB.php';
    include_once '../model/BDPDO.php';
    //llamamos al metodo
    DepartamentoPDO::sacarDescripciones($_REQUEST['buscaDescripcion']);
}

if(isset($_REQUEST['provincia']) && isset($_SESSION['DAW215LoginLogoutPOOUsuario'])){
    //Incluimos los ficheros necesarios
    include_once '../model/DepartamentoPDO.php';
    include_once '../config/ConfDB.php';
    include_once '../model/BDPDO.php';
    //llamamos al metodo
    DepartamentoPDO::sacarProvincia($_REQUEST['provincia']);
}
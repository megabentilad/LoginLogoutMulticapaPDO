<?php
session_start();
if(isset($_REQUEST['buscaDescripcion']) && isset($_SESSION['DAW215LoginLogoutPOOUsuario'])){
    //Incluimos los ficheros necesarios
    include_once '../model/DepartamentoPDO.php';
    include_once '../config/ConfDB.php';
    include_once '../model/BDPDO.php';
    //llamamos al metodo
    DepartamentoPDO::sacarDescripciones($_REQUEST['buscaDescripcion']);
}
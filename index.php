<?php
    /*Totalmente basado (por no decir copiado) en David*/
    //Incluir los archivos de configuración
include_once 'config/ConfAplicación.php';
include_once 'config/ConfDB.php';

session_start();
 if (!isset($_SESSION['DAW215LoginLogoutPOO'])) {  //Si el usuario no está definido, entras al login y, si está definido, al inicio
     include_once $controladores['login'];
}else{
    include_once $controladores['inicio'];
}
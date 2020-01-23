<?php
    /*Totalmente basado (por no decir copiado) en David*/
    //Incluir los archivos de configuración
include_once 'config/ConfAplicación.php';
include_once 'config/ConfDB.php';

session_start();


 
if (!isset($_SESSION['DAW215LoginLogoutPOOUsuario'])) {  //Si el usuario no está definido, entras al login y, si está definido, al inicio
     if(!isset($_SESSION['DAW215LLPagina'])){
         include_once $controladores['login'];
     }else{
        include_once $controladores[$_SESSION['DAW215LLPagina']]; //Si le digo que entre a registro, el programa, por algún motivo, explota al iniciar sesion
     }
}else{
    if(isset($_SESSION['DAW215LLPagina'])){ //Si no se especifica a la página a la que ir, vas a inicio
        include_once $controladores[$_SESSION['DAW215LLPagina']];
    }else{
        include_once $controladores['inicio'];
    }
}
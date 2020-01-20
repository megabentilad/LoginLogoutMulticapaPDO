<?php
    /*Totalmente basado (por no decir copiado) en David*/
    //Incluir los archivos de configuración
include_once 'config/ConfAplicación.php';
include_once 'config/ConfDB.php';
setlocale(LC_ALL,"es_ES.UTF-8"); //Pongo el idioma en español
session_destroy();
session_start();
foreach ($GLOBALS as $todo => $variable) {
                if (is_array($variable)) {
                    if ($variable != $GLOBALS) {
                        echo"<h2>" . $todo . "</h2><table>";
                        foreach ($variable as $indice => $contenido) {
                            echo'<tr><td>' . $indice . '</td><td>[' . "'" . $contenido . "']</td></tr>";
                        }
                        echo"</table><br/>";
                    }
                } else {
                    echo $variable . "<br/>";
                }
            
            }
            
            
if(isset($_REQUEST['pagina'])){
    $_SESSION['DAW215LLPagina'] = $_REQUEST['pagina'];
    
}     
if (!isset($_SESSION['DAW215LoginLogoutPOO'])) {  //Si el usuario no está definido, entras al login y, si está definido, al inicio
     if(!isset($_SESSION['DAW215LLPagina'])){
         include_once $controladores['login'];
     }else{
        include_once $_SESSION['DAW215LLPagina'];
     }
}else{
    if(isset($_SESSION['DAW215LLPagina'])){ //Si no se especifica a la página a la que ir, vas a inicio
        include_once $_SESSION['DAW215LLPagina'];
    }else{
        include_once $controladores['inicio'];
    }
}
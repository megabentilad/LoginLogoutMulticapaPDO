<?php

if (isset($_GET["cerrar"])) {
    session_destroy();
    header("location: index.php");
    exit;
} else {
    $_SESSION[fechaConexionAnterior] = new DateTime($_SESSION["DAW215LoginLogoutPOO"]["T01_FechaHoraUltimaConexion"]);
    
    if ($_SESSION["DAW215LoginLogoutPOO"]["T01_NumAccesos"] == 0) {
        $mensajeDeBienvenida = "Wolas, es la primera vez que te conectas, " . $_SESSION["DAW215LoginLogoutPOO"]["T01_DescUsuario"] . ".";
    } else{
        $mensajeDeBienvenida = "Es un placer verte de nuevo, " .  ucfirst($_SESSION["DAW215LoginLogoutPOO"]["T01_DescUsuario"]) .". Esta es la " . $_SESSION["DAW215LoginLogoutPOO"]["T01_NumAccesos"] + 1 . "ª vez que me visitas. La ultima vez que lo hiciste fue el " . $_SESSION[fechaConexionAnterior]->format("d \d\e\l m \d\e Y \a \l\a\s H:i:s");
    }
    //Cosas del idioma
    if(!isset($_COOKIE['idiomaDAW215'])){  //Por si acaso la cookie expira durante la conexión
        setcookie('idiomaDAW215', 'espanol', time()+604800);     //Coockie de idioma. Dura una semana
        header("Location: index.php");
        exit;
    }

    if(isset($_GET['idioma'])){   //Si se ha pulsado una bandera, actualiza la cookie
        setcookie('idiomaDAW215', $_GET['idioma'], time()+604800); //Dura una semana
        header("Location: index.php");
        exit;
    }

    $vista = $vistas['inicio']; //le digo al controlador la vista de inicio
    $tituloPagina = "Página de usuario registrado"; //Sirve para la cabecera
    require_once $vistas['layout']; //cargo la página que contiene inicio
}
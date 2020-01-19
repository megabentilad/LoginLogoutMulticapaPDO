<?php

if (isset($_GET["cerrar"])) {
    session_destroy();
    header("location: index.php");
    exit;
} else {
    if ($_SESSION["DAW215LoginLogoutPOO"]->getNumAccesos() == 0) {
        $mensajeDeBienvenida = "Wolas, es la primera vez que te conectas, " . ucfirst($_SESSION["DAW215LoginLogoutPOO"]->getDescUsuario()) . ".";
    } else{
        $fechaUltimaConexion = new DateTime();
        $fechaUltimaConexion->setTimezone(new DateTimeZone('Europe/Madrid'));
        $fechaUltimaConexion->setTimestamp($_SESSION['DAW215LoginLogoutPOO']->getFechaHoraUltimaConexion());
        $mensajeDeBienvenida = "Es un placer verte de nuevo, " .  ucfirst($_SESSION["DAW215LoginLogoutPOO"]->getDescUsuario()) .". <br/><br/>Esta es la " . (intval($_SESSION["DAW215LoginLogoutPOO"]->getNumAccesos()) + 1) . "ª vez que me visitas. <br/><br/>La ultima vez que te conectaste fue el " . $fechaUltimaConexion->format("d \d\e F \d\e\ Y \a \l\a\s H:i:s");
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
    $_SESSION['DAW215LLPOOtituloPagina'] = "Página de usuario registrado"; //Sirve para la cabecera
    require_once $vistas['layout']; //cargo la página que contiene inicio
}
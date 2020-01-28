<?php
unset($_SESSION['DAW215LLBusquedaDescripcion']);
unset($_SESSION['DAW215LLBusquedaPokemon']);
unset($_SESSION['DAW215LLBusquedaPokemonShiny']);
unset($_SESSION['DAW215LLBusquedaPokemonSprite']);
if(isset($_REQUEST['pagina'])){
    $_SESSION['DAW215LLPaginaAnterior'] = $_SESSION['DAW215LLPagina'];
    $_SESSION['DAW215LLPagina'] = $_REQUEST['pagina'];
    header("Location: index.php"); //Volvemos a cargar el indx ahora que tenemos un usuario en la sesión
    exit;
}
setlocale(LC_ALL,"es_ES.UTF-8"); //Pongo el idioma en español
if (isset($_GET["cerrar"])) {
    session_destroy();
    header("location: index.php");
    exit;
} else {
    if ($_SESSION["DAW215LoginLogoutPOOUsuario"]->getNumAccesos() == 0) {
        $mensajeDeBienvenida = "Wolas, es la primera vez que te conectas, " . ucfirst($_SESSION["DAW215LoginLogoutPOOUsuario"]->getDescUsuario()) . ".";
    } else{
        $fechaUltimaConexion = new DateTime();
        $fechaUltimaConexion->setTimezone(new DateTimeZone('Europe/Madrid'));
        $fechaUltimaConexion->setTimestamp($_SESSION['DAW215LoginLogoutPOOUsuario']->getFechaHoraUltimaConexion());
        $mensajeDeBienvenida = "Es un placer verte de nuevo, " .  ucfirst($_SESSION["DAW215LoginLogoutPOOUsuario"]->getDescUsuario()) .". <br/><br/>Esta es la " . (intval($_SESSION["DAW215LoginLogoutPOOUsuario"]->getNumAccesos()) + 1) . "ª vez que me visitas. <br/><br/>La ultima vez que te conectaste fue el " . $fechaUltimaConexion->format("d") . " de " . $fechaUltimaConexion->format("F") . " del " . $fechaUltimaConexion->format("Y \a \l\a\s H:i:s");
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

    $vista = $vistas[$_SESSION['DAW215LLPagina']]; //le digo al controlador la vista de inicio
    $_SESSION['DAW215LLPOOtituloPagina'] = ucfirst($_SESSION['DAW215LLPagina']); //Sirve para la cabecera
    require_once $vistas['layout']; //cargo la página que contiene inicio
}
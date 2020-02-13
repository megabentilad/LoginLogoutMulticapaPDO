<?php
unset($_SESSION['DAW215LoginLogoutPOOUsuarioGestionar']);
if(isset($_REQUEST['codigoModificarBorrar'])){
    $_SESSION['DAW215LLPaginaAnterior'] = $_SESSION['DAW215LLPagina'];
    $_SESSION['DAW215LLPagina'] =  $_REQUEST['pagina'];
    $_SESSION['DAW215LoginLogoutPOOUsuarioGestionar'] = UsuarioPDO::buscarUsuarioPorCodigo($_REQUEST['codigoModificarBorrar']);
    header("Location: index.php");
    exit;
}
if(isset($_REQUEST['pagina'])){
    $_SESSION['DAW215LLPaginaAnterior'] = $_SESSION['DAW215LLPagina'];
    $_SESSION['DAW215LLPagina'] =  $_REQUEST['pagina'];
    header("Location: index.php"); 
    exit;
}
if(!isset($_SESSION['DAW215LLBusquedaDescripcion'])){
    $_SESSION['DAW215LLBusquedaDescripcion'] = "";
}
if(isset($_POST['buscar'])){
    $_SESSION['DAW215LLBusquedaDescripcion'] = $_REQUEST['busqueda'];
    $_SESSION['DAW215LLPOONumPagina'] = 0;
    header("Location: index.php");
    exit;
}
if(isset($_REQUEST['paginacion'])){
    $_SESSION['DAW215LLPOONumPagina'] = $_REQUEST['paginacion'];
    header("Location: index.php");
    exit;
}

$aUsuarios = UsuarioPDO::buscarUsuariosPorDescripcion("%" . $_SESSION['DAW215LLBusquedaDescripcion'] . "%");
if($_SESSION['DAW215LLPOONumPagina'] >= $_SESSION['DAW215LLPOONumPaginasTotales']){ //Esto es para evitar bugs con la paginación (estar en la página tres, hacer una búsqueda con una página y quedarte en la página 3)
    $_SESSION['DAW215LLPOONumPagina'] = $_SESSION['DAW215LLPOONumPaginasTotales']-1;
    header("Location: index.php");
    exit;
}
if(count($aUsuarios) > 0){
    $tabla = "<table><thead><tr><th>Código</th><th>Descripción</th><th>Nº accesos</th><th>Perfil</th><th>Editar</th><th>Borrar</th></tr></thead><tbody>";
    foreach ($aUsuarios as $clave => $valor){
        $tabla .= "<tr><td>" . $valor->getCodUsuario() . "</td><td>" . $valor->getDescUsuario() . "</td><td>" . $valor->getNumAccesos() . "</td><td>" . $valor->getPerfil() . "</td><td><a href='" . $_SERVER['PHP_SELF'] . "?pagina=consultarModificarUsuario&codigoModificarBorrar=" . $valor->getCodUsuario() ."'><img src='webroot/img/editar.png' class='imagenTabla'></a></td><td><a href='" . $_SERVER['PHP_SELF'] . "?pagina=eliminarUsuario&codigoModificarBorrar=" . $valor->getCodUsuario() ."'><img src='webroot/img/borrar.png' class='imagenTabla'></a></td></tr>";
    }
    $tabla .= "</tbody></table>";
    
    //paginación
    if($_SESSION['DAW215LLPOONumPagina'] == 0){
        $paginacion = "<div id='paginacion'><button id='pagPrimera' disabled class='paginacionFinal'><img src='webroot/img/flechaDoble.png' class='paginacionImg'></button><button id='pagAnterior' disabled class='paginacionFinal'><img src='webroot/img/flechaSimple.png' class='paginacionImg'></button>";
    }else{
        $paginacion = "<div id='paginacion'><a href='" . $_SERVER['PHP_SELF'] . "?paginacion=0'><button id='pagPrimera'><img src='webroot/img/flechaDoble.png' class='paginacionImg'></button></a><a href='" . $_SERVER['PHP_SELF'] . "?paginacion=" . intval($_SESSION['DAW215LLPOONumPagina']-1) . "'><button id='pagAnterior'><img src='webroot/img/flechaSimple.png' class='paginacionImg'></button></a>";
    }
    $paginacion .="<button class='botonPagina pagActual'>" . intval($_SESSION['DAW215LLPOONumPagina']+1) . "</button>";

    if($_SESSION['DAW215LLPOONumPagina'] == ($_SESSION['DAW215LLPOONumPaginasTotales']-1)){
        $paginacion .= "<button id='pagSiguiente' class='paginacionFinal'><img src='webroot/img/flechaSimple.png' class='paginacionImg' style='transform: rotate(180deg)'></button><button id='pagFinal' class='paginacionFinal'><img src='webroot/img/flechaDoble.png' class='paginacionImg' style='transform: rotate(180deg)'></button></div>";
    }else{
        $paginacion .= "<a href='" . $_SERVER['PHP_SELF'] . "?paginacion=" . intval($_SESSION['DAW215LLPOONumPagina']+1) . "'><button id='pagSiguiente'><img src='webroot/img/flechaSimple.png' class='paginacionImg' style='transform: rotate(180deg)'></button></a><a href='" . $_SERVER['PHP_SELF'] . "?paginacion=" . intval($_SESSION['DAW215LLPOONumPaginasTotales']-1) . "'><button id='pagFinal'><img src='webroot/img/flechaDoble.png' class='paginacionImg' style='transform: rotate(180deg)'></button></a></div>";
    }
}else{
    $tabla = "<h2>No hay usuarios</h2>";
    $paginacion = "";
}


$vista = $vistas[$_SESSION['DAW215LLPagina']]; //guarda la variable para que el layout sepa que mostrar
$_SESSION['DAW215LLPOOtituloPagina'] = ucfirst($_SESSION['DAW215LLPagina']); //Sirve para la cabecera
require_once $vistas["layout"]; //muesto el layout con el login cómo base

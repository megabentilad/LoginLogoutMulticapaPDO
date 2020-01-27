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
    header("Location: index.php");
    exit;
}

$aUsuarios = UsuarioPDO::buscarUsuariosPorDescripcion("%" . $_SESSION['DAW215LLBusquedaDescripcion'] . "%");
if(count($aUsuarios) > 0){
    $tabla = "<table><thead><tr><th>Código</th><th>Descripción</th><th>Nº accesos</th><th>Perfil</th><th>Editar</th><th>Borrar</th></tr></thead><tbody>";
    foreach ($aUsuarios as $clave => $valor){
        $tabla .= "<tr><td>" . $valor->getCodUsuario() . "</td><td>" . $valor->getDescUsuario() . "</td><td>" . $valor->getNumAccesos() . "</td><td>" . $valor->getPerfil() . "</td><td><a href='" . $_SERVER['PHP_SELF'] . "?pagina=consultarModificarUsuario&codigoModificarBorrar=" . $valor->getCodUsuario() ."'><img src='webroot/img/editar.png' class='imagenTabla'></a></td><td><a href='" . $_SERVER['PHP_SELF'] . "?pagina=eliminarUsuario&codigoModificarBorrar=" . $valor->getCodUsuario() ."'><img src='webroot/img/borrar.png' class='imagenTabla'></a></td></tr>";
    }
    $tabla .= "</tbody></table>";
}else{
    $tabla = "<h2>No hay usuarios</h2>";
}


$vista = $vistas[$_SESSION['DAW215LLPagina']]; //guarda la variable para que el layout sepa que mostrar
$_SESSION['DAW215LLPOOtituloPagina'] = ucfirst($_SESSION['DAW215LLPagina']); //Sirve para la cabecera
require_once $vistas["layout"]; //muesto el layout con el login cómo base

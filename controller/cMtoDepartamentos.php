<?php
unset($_SESSION['DAW215LoginLogoutPOODepartamento']);
if(isset($_REQUEST['codigoModificarBorrar'])){
    $_SESSION['DAW215LLPaginaAnterior'] = $_SESSION['DAW215LLPagina'];
    $_SESSION['DAW215LLPagina'] =  $_REQUEST['pagina'];
    $_SESSION['DAW215LoginLogoutPOODepartamento'] = DepartamentoPDO::buscarDepartamentoPorCodigo($_REQUEST['codigoModificarBorrar']);
    header("Location: index.php");
    exit;
}
if(isset($_REQUEST['pagina'])){
    $_SESSION['DAW215LLPaginaAnterior'] = $_SESSION['DAW215LLPagina'];
    $_SESSION['DAW215LLPagina'] =  $_REQUEST['pagina'];
    header("Location: index.php"); 
    exit;
}
if(isset($_REQUEST['ponerAlta'])){
    DepartamentoPDO::rehabilitaDepartamento($_REQUEST['codigo']);
    header("Location: index.php");
    exit;
}
if(isset($_REQUEST['ponerBaja'])){
    DepartamentoPDO::bajaLogicaDepartamento($_REQUEST['codigo']);
    header("Location: index.php");
    exit;
}
if(!isset($_SESSION['DAW215LLBusquedaDescripcion'])){
    $_SESSION['DAW215LLBusquedaDescripcion'] = "";
}
if(!isset($_SESSION['DAW215LLBusquedaEstado'])){
    $_SESSION['DAW215LLBusquedaEstado'] = "todos";
}
if(isset($_POST['buscar'])){
    $_SESSION['DAW215LLBusquedaDescripcion'] = $_REQUEST['busqueda'];
    $_SESSION['DAW215LLBusquedaEstado'] = $_REQUEST['estado'];
    header("Location: index.php");
    exit;
}
if(isset($_REQUEST['paginacion'])){
    $_SESSION['DAW215LLPOONumPagina'] = $_REQUEST['paginacion'];
    header("Location: index.php");
    exit;
}

$aDepartamentos = DepartamentoPDO::buscarDepartamentosPorDescripcion("%" . $_SESSION['DAW215LLBusquedaDescripcion'] . "%");
if(count($aDepartamentos) > 0){
    $tabla = "<table><thead><tr><th>Código</th><th>Descripción</th><th>Alta/Baja</th><th>Editar</th><th>Borrar</th></tr></thead><tbody>";
    foreach ($aDepartamentos as $clave => $valor){
        switch($_SESSION['DAW215LLBusquedaEstado']){
            case "alta":
                if($valor->getFechaBajaDepartamento() == null){
                    $tabla .= "<tr><td>" . $valor->getCodDepartamento() . "</td><td>" . $valor->getDescDepartamento() . "</td><td><a href='" . $_SERVER['PHP_SELF'] . "?ponerBaja=true&codigo=" . $valor->getCodDepartamento() ."'><img src='webroot/img/alta.png' class='imagenTabla'></a></td><td><a href='" . $_SERVER['PHP_SELF'] . "?pagina=consultarModificarDepartamento&codigoModificarBorrar=" . $valor->getCodDepartamento() ."'><img src='webroot/img/editar.png' class='imagenTabla'></a></td><td><a href='" . $_SERVER['PHP_SELF'] . "?pagina=eliminarDepartamento&codigoModificarBorrar=" . $valor->getCodDepartamento() ."'><img src='webroot/img/borrar.png' class='imagenTabla'></a></td></tr>";
                }
                break;
            case "baja":
                if($valor->getFechaBajaDepartamento() != null){
                    $tabla .= "<tr><td>" . $valor->getCodDepartamento() . "</td><td>" . $valor->getDescDepartamento() . "</td><td><a href='" . $_SERVER['PHP_SELF'] . "?ponerAlta=true&codigo=" . $valor->getCodDepartamento() ."'><img src='webroot/img/baja.png' class='imagenTabla'></a></td><td><a href='" . $_SERVER['PHP_SELF'] . "?pagina=consultarModificarDepartamento&codigoModificarBorrar=" . $valor->getCodDepartamento() ."'><img src='webroot/img/editar.png' class='imagenTabla'></a></td><td><a href='" . $_SERVER['PHP_SELF'] . "?pagina=eliminarDepartamento&codigoModificarBorrar=" . $valor->getCodDepartamento() ."'><img src='webroot/img/borrar.png' class='imagenTabla'></a></td></tr>";
                }
                break;
            default:
                if($valor->getFechaBajaDepartamento() == null){
                    $tabla .= "<tr><td>" . $valor->getCodDepartamento() . "</td><td>" . $valor->getDescDepartamento() . "</td><td><a href='" . $_SERVER['PHP_SELF'] . "?ponerBaja=true&codigo=" . $valor->getCodDepartamento() ."'><img src='webroot/img/alta.png' class='imagenTabla'></a></td><td><a href='" . $_SERVER['PHP_SELF'] . "?pagina=consultarModificarDepartamento&codigoModificarBorrar=" . $valor->getCodDepartamento() ."'><img src='webroot/img/editar.png' class='imagenTabla'></a></td><td><a href='" . $_SERVER['PHP_SELF'] . "?pagina=eliminarDepartamento&codigoModificarBorrar=" . $valor->getCodDepartamento() ."'><img src='webroot/img/borrar.png' class='imagenTabla'></a></td></tr>";
                }else{
                    $tabla .= "<tr><td>" . $valor->getCodDepartamento() . "</td><td>" . $valor->getDescDepartamento() . "</td><td><a href='" . $_SERVER['PHP_SELF'] . "?ponerAlta=true&codigo=" . $valor->getCodDepartamento() ."'><img src='webroot/img/baja.png' class='imagenTabla'></a></td><td><a href='" . $_SERVER['PHP_SELF'] . "?pagina=consultarModificarDepartamento&codigoModificarBorrar=" . $valor->getCodDepartamento() ."'><img src='webroot/img/editar.png' class='imagenTabla'></a></td><td><a href='" . $_SERVER['PHP_SELF'] . "?pagina=eliminarDepartamento&codigoModificarBorrar=" . $valor->getCodDepartamento() ."'><img src='webroot/img/borrar.png' class='imagenTabla'></a></td></tr>";
                }
        } 
    }
    $tabla .= "</tbody></table>";
    
    //paginación
    if($_SESSION['DAW215LLPOONumPagina'] == 0){
        $paginacion = "<div id='paginacion'><button id='pagAnterior' disabled ><div id='divPagAnterior'></div></button>";
    }else{
        $paginacion = "<div id='paginacion'><button id='pagAnterior'><div id='divPagAnterior'></div></button>";
    }
    
    for($i = 0; $i<$_SESSION['DAW215LLPOONumPaginasTotales']; $i++){
        $paginacion .="<a href='" . $_SERVER['PHP_SELF'] . "?paginacion=" . $i . "'><button class='botonPagina'>" . ($i+1) . "</button></a>";
    }
    $paginacion .= "<button id='pagSiguiente'><div id='divPagSiguiente'></div></button></div>";
}else{
    $tabla = "<h2>No hay departamentos</h2>";
    $paginacion = "";
}


$vista = $vistas[$_SESSION['DAW215LLPagina']]; //guarda la variable para que el layout sepa que mostrar
$_SESSION['DAW215LLPOOtituloPagina'] = ucfirst($_SESSION['DAW215LLPagina']); //Sirve para la cabecera
require_once $vistas["layout"]; //muesto el layout con el login cómo base

<?php
/**
 * Useless function
 * 
 * Soy un fichero, jopé
 * @package POO-LMR
 * @author Luis Mateo Rivera Uriarte
 */
if(isset($_REQUEST['pagina'])){
    $_SESSION['DAW215LLPaginaAnterior'] = $_SESSION['DAW215LLPagina'];
    $_SESSION['DAW215LLPagina'] =  $_REQUEST['pagina'];
    header("Location: index.php"); 
    exit;
}
if(!isset($_SESSION['DAW215LLBusquedaPokemon'])){
    $_SESSION['DAW215LLBusquedaPokemon'] = "";
}
if(!isset($_SESSION['DAW215LLBusquedaPokemonShiny'])){
    $_SESSION['DAW215LLBusquedaPokemonShiny'] = false;
}
if(!isset($_SESSION['DAW215LLBusquedaPokemonGenero'])){
    $_SESSION['DAW215LLBusquedaPokemonGenero'] = "macho";
}
if(!isset($_SESSION['DAW215LLBusquedaPokemonErrorGenero'])){
    $_SESSION['DAW215LLBusquedaPokemonErrorGenero'] = null;
}

if(!isset($_SESSION['DAW215LLBusquedaVolPropio'])){
    $_SESSION['DAW215LLBusquedaVolPropio'] = "";
}
if(!isset($_SESSION['DAW215LLValorVolPropio'])){
    $_SESSION['DAW215LLValorVolPropio'] = "";
}

//var_dump(REST::twitterApiREST("EvilAFM"));

$entradaOK = true;
$aErrores = [
    'pokemon' => null,
    'codPropio' => null
];

        //POKEAPI
if (isset($_POST['buscar'])) { //Si se ha pulsado enviar
    //La posición del array de errores recibe el mensaje de error si hubiera
    $aErrores['pokemon'] = validacionFormularios::comprobarNoVacio($_POST['pokemon']);
    
    foreach ($aErrores as $campo => $error) { //Recorre el array en busca de mensajes de error
        if ($error != null) { //Si lo encuentra vacia el campo y cambia la condiccion
            $entradaOK = false; //Cambia la condiccion de la variable
            $_SESSION['DAW215LLBusquedaPokemon'] = "";
            unset($_SESSION['DAW215LLBusquedaPokemonDatos']);
            $_SESSION['DAW215LLBusquedaPokemonErrorGenero'] = null;
        }
    }

    if ($entradaOK) {
        $_SESSION['DAW215LLBusquedaPokemon'] = strtolower($_POST['pokemon']);
        $_SESSION['DAW215LLBusquedaPokemonGenero'] = ($_POST['genero']);
        if(isset($_POST['shiny'])){
            $_SESSION['DAW215LLBusquedaPokemonShiny'] = true;
        }
        $datosPokemon = REST::pokemonApiREST($_SESSION['DAW215LLBusquedaPokemon']);
        if (is_null($datosPokemon)) { 
            $aErrores['pokemon'] = "No se ha podido encontrar al pokemon.";
            $_SESSION['DAW215LLBusquedaPokemonErrorGenero'] = null;
            $_SESSION['DAW215LLBusquedaPokemon'] = "";
            unset($_SESSION['DAW215LLBusquedaPokemonDatos']);
            $_SESSION['DAW215LLBusquedaPokemonGenero'] = "macho";
            $_SESSION['DAW215LLBusquedaPokemonShiny'] = false;
        }else{     
            $_SESSION['DAW215LLBusquedaPokemonDatos'] = $datosPokemon;
        }
        if(is_null($aErrores['pokemon'])){
            header("Location: index.php");
            exit;
        }
    }
}


        //API PROPIA
if (isset($_POST['buscarPropio'])) { //Si se ha pulsado enviar
    //La posición del array de errores recibe el mensaje de error si hubiera
    $aErrores['codPropio'] = validacionFormularios::comprobarAlfabetico($_POST['codPropio'],3,3,1); //max, min y obligatoriedad
    
    if(strlen(trim(substr($_POST['codPropio'],1))) != 2 && $aErrores['codPropio'] == null){
        $aErrores['codPropio'] = "No puede haber espacios.";
    }
    foreach ($aErrores as $campo => $error) { //Recorre el array en busca de mensajes de error
        if ($error != null) { //Si el código está mal formateado, da error
            $entradaOK = false; //Cambia la condiccion de la variable
            $_SESSION['DAW215LLBusquedaVolPropio'] = "";
            $_SESSION['DAW215LLValorVolPropio'] = "";
        }
    }

    if ($entradaOK) {
        $_SESSION['DAW215LLBusquedaVolPropio'] = strtoupper($_POST['codPropio']);
        
        $volumenPropio = REST::propioApiREST($_SESSION['DAW215LLBusquedaVolPropio']);
        if (is_null($volumenPropio)) { 
            $aErrores['codPropio'] = "Ese departamento no existe.";
            $_SESSION['DAW215LLBusquedaVolPropio'] = "";
            $_SESSION['DAW215LLValorVolPropio'] = "";
        }else{
            $_SESSION['DAW215LLValorVolPropio'] = $volumenPropio;
        }
        if(is_null($aErrores['codPropio'])){
            header("Location: index.php");
            exit;
        }
    }
}

$vista = $vistas[$_SESSION['DAW215LLPagina']]; //guarda la variable para que el layout sepa que mostrar
$_SESSION['DAW215LLPOOtituloPagina'] = ucfirst($_SESSION['DAW215LLPagina']); //Sirve para la cabecera
require_once $vistas["layout"]; //muesto el layout con el login cómo base
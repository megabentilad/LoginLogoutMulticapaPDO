<?php
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

//var_dump(REST::twitterApiREST("EvilAFM"));

$entradaOK = true;
$aErrores = [
    'pokemon' => null,
];
if (isset($_POST['buscar'])) { //Si se ha pulsado enviar
    //La posición del array de errores recibe el mensaje de error si hubiera
    $aErrores['pokemon'] = validacionFormularios::comprobarNoVacio($_POST['pokemon']);
    
    foreach ($aErrores as $campo => $error) { //Recorre el array en busca de mensajes de error
        if ($error != null) { //Si lo encuentra vacia el campo y cambia la condiccion
            $entradaOK = false; //Cambia la condiccion de la variable
            $_SESSION['DAW215LLBusquedaPokemon'] = "";
            unset($_SESSION['DAW215LLBusquedaPokemonSprite']);
            unset($_SESSION['DAW215LLBusquedaPokemonSprite2']);
            unset($_SESSION['DAW215LLBusquedaPokemonDatos']);
            $_SESSION['DAW215LLBusquedaPokemonErrorGenero'] = null;
        }
    }

    if ($entradaOK) {
        $_SESSION['DAW215LLBusquedaPokemon'] = $_POST['pokemon'];;
        
        $datosPokemon = REST::pokemonApiREST($_SESSION['DAW215LLBusquedaPokemon']);
        if (is_null($datosPokemon)) { 
            $aErrores['pokemon'] = "No se ha podido encontrar al pokemon.";
            $_SESSION['DAW215LLBusquedaPokemonErrorGenero'] = null;
            $_SESSION['DAW215LLBusquedaPokemon'] = "";
            unset($_SESSION['DAW215LLBusquedaPokemonSprite']);
            unset($_SESSION['DAW215LLBusquedaPokemonSprite2']);
            unset($_SESSION['DAW215LLBusquedaPokemonDatos']);
        }else{
            if($datosPokemon->getPokeSprites()['front_female'] == null){ //Si el poquemon no tiene variación de genero, muestra una alerta
                $_SESSION['DAW215LLBusquedaPokemonErrorGenero'] = "Este pokemon no tiene variación de genero."; 
            }else{
                $_SESSION['DAW215LLBusquedaPokemonErrorGenero'] = null;
            }
            if($_POST['genero'] == "macho" || $datosPokemon->getPokeSprites()['front_female'] == null){  //si el poquemon es macho o no tiene variación de género, muestra estas imágenes
                if(isset($_POST['shiny'])){  //Si es shiny, se muestran estos 2
                    $_SESSION['DAW215LLBusquedaPokemonSprite'] = $datosPokemon->getPokeSprites()['front_shiny'];
                    $_SESSION['DAW215LLBusquedaPokemonSprite2'] = $datosPokemon->getPokeSprites()['back_shiny'];
                    $_SESSION['DAW215LLBusquedaPokemonShiny'] = true;
                }else{ //si no es shiny, se muestran estos dos
                    $_SESSION['DAW215LLBusquedaPokemonSprite'] = $datosPokemon->getPokeSprites()['front_default'];
                    $_SESSION['DAW215LLBusquedaPokemonSprite2'] = $datosPokemon->getPokeSprites()['back_default'];
                    $_SESSION['DAW215LLBusquedaPokemonShiny'] = false;
                }
                $_SESSION['DAW215LLBusquedaPokemonGenero'] = "macho";  //Se establece como macho para que se seleccione el radiobutton
            }else{  //Si es hembra y tiene variación de genero, entra por aquí
                if(isset($_POST['shiny'])){
                    $_SESSION['DAW215LLBusquedaPokemonSprite'] = $datosPokemon->getPokeSprites()['front_shiny_female'];
                    $_SESSION['DAW215LLBusquedaPokemonSprite2'] = $datosPokemon['sprites']['back_shiny_female'];
                    $_SESSION['DAW215LLBusquedaPokemonShiny'] = true;
                }else{
                    $_SESSION['DAW215LLBusquedaPokemonSprite'] = $datosPokemon->getPokeSprites()['front_female'];
                    $_SESSION['DAW215LLBusquedaPokemonSprite2'] = $datosPokemon->getPokeSprites()['back_female'];
                    $_SESSION['DAW215LLBusquedaPokemonShiny'] = false;
                }
                $_SESSION['DAW215LLBusquedaPokemonGenero'] = "hembra";
            }
            $_SESSION['DAW215LLBusquedaPokemonDatos'] = $datosPokemon;
        }
        if(is_null($aErrores['pokemon'])){
            header("Location: index.php");
            exit;
        }
    }
}

$vista = $vistas[$_SESSION['DAW215LLPagina']]; //guarda la variable para que el layout sepa que mostrar
$_SESSION['DAW215LLPOOtituloPagina'] = ucfirst($_SESSION['DAW215LLPagina']); //Sirve para la cabecera
require_once $vistas["layout"]; //muesto el layout con el login cómo base
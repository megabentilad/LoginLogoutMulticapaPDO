<?php
if(!isset($_SESSION['DAW215LLBusquedaPokemon'])){
    $_SESSION['DAW215LLBusquedaPokemon'] = "";
}
if(!isset($_SESSION['DAW215LLBusquedaPokemonShiny'])){
    $_SESSION['DAW215LLBusquedaPokemonShiny'] = false;
}
if(isset($_REQUEST['pagina'])){
    $_SESSION['DAW215LLPaginaAnterior'] = $_SESSION['DAW215LLPagina'];
    $_SESSION['DAW215LLPagina'] =  $_REQUEST['pagina'];
    header("Location: index.php"); 
    exit;
}

function apiREST($method, $url, $data = false){
    $curl = curl_init();

    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}

$entradaOK = true;
$aErrores = [
    'pokemon' => null
];
if (isset($_POST['buscar'])) { //Si se ha pulsado enviar
    //La posición del array de errores recibe el mensaje de error si hubiera
    $aErrores['pokemon'] = validacionFormularios::comprobarNoVacio($_POST['pokemon']);
    
    foreach ($aErrores as $campo => $error) { //Recorre el array en busca de mensajes de error
        if ($error != null) { //Si lo encuentra vacia el campo y cambia la condiccion
            $entradaOK = false; //Cambia la condiccion de la variable
            $_SESSION['DAW215LLBusquedaPokemon'] = "";
            unset($_SESSION['DAW215LLBusquedaPokemonSprite']);
        }
    }

    if ($entradaOK) {
        $pokemon = $_POST['pokemon'];
        $_SESSION['DAW215LLBusquedaPokemon'] = $pokemon;
        $method = "GET";
        $url = "https://pokeapi.co/api/v2/pokemon/" . $pokemon . "/";
        $datosPokemon = json_decode(apiREST($method, $url),true);
        if (is_null($datosPokemon)) { 
            $aErrores['pokemon'] = "El formato no es valido";
            $_SESSION['DAW215LLBusquedaPokemon'] = "";
            unset($_SESSION['DAW215LLBusquedaPokemonSprite']);
        }else{
            if(isset($_POST['shiny'])){
                $_SESSION['DAW215LLBusquedaPokemonSprite'] = $datosPokemon['sprites']['front_shiny'];
                $_SESSION['DAW215LLBusquedaPokemonShiny'] = true;
            }else{
                $_SESSION['DAW215LLBusquedaPokemonSprite'] = $datosPokemon['sprites']['front_default'];
                $_SESSION['DAW215LLBusquedaPokemonShiny'] = false;
            }
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
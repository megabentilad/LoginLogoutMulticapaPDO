<?php

/**
 * Class REST
 *
 * Clase que contiene todos los métodos de apiREST
 *
 * Clase que contiene todos los métodos de apiREST necesarios para utilizar apis externas
 *
 * @author Luis Mateo Rivera Uriarte
 * @version 1.0
 *
 */

class REST {

    /**
     * Función que obtiene los datos de un pokemon.
     * 
     * Función que obtiene los datos de un pokemon y los guarda en un array.
     * 
     * @function pokemonApiREST();
     * @author Luis Mateo Rivera Uriarte
     * @version 1.0 Funciona y hace lo que debe hacer.
     * @param $pokemon ID o nombre del pokemon que se busca.
     * @return Pokemon
     * */
    public static function pokemonApiREST($pokemon){
        $curl = curl_init(); //Iniciamos el curl
        $url = "https://pokeapi.co/api/v2/pokemon/" . $pokemon . "/";  //Preparamos la url de la api con el pokemon que buscamos

        curl_setopt($curl, CURLOPT_URL, $url); //Le decimos que queremos los datos de esa url
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); //le decimos que lo guarde en "curl_exec" en vez de mostrarlo

        $result = curl_exec($curl); //cogemos el resultado de curl_exec para devolverlo
        $resultadoFinal = json_decode($result,true);
        curl_close($curl); //cerramos el curl

        if($resultadoFinal == null){
            return $resultadoFinal;
        }else{
             if ($resultadoFinal['sprites']['front_female'] == null) { //Si el poquemon no tiene variación de genero, muestra una alerta
                $_SESSION['DAW215LLBusquedaPokemonErrorGenero'] = "Este pokemon no tiene variación de genero.";
            } else {
                $_SESSION['DAW215LLBusquedaPokemonErrorGenero'] = null;
            }
            if ($_SESSION['DAW215LLBusquedaPokemonGenero'] == "macho" || $resultadoFinal['sprites']['front_female'] == null) {  //si el poquemon es macho o no tiene variación de género, muestra estas imágenes
                if ($_SESSION['DAW215LLBusquedaPokemonShiny']) {  //Si es shiny, se muestran estos 2
                    $sprite1 = $resultadoFinal['sprites']['front_shiny'];
                    $sprite2 = $resultadoFinal['sprites']['back_shiny'];
                    $_SESSION['DAW215LLBusquedaPokemonShiny'] = true;
                } else { //si no es shiny, se muestran estos dos
                    $sprite1 = $resultadoFinal['sprites']['front_default'];
                    $sprite2 = $resultadoFinal['sprites']['back_default'];
                    $_SESSION['DAW215LLBusquedaPokemonShiny'] = false;
                }
                $_SESSION['DAW215LLBusquedaPokemonGenero'] = "macho";  //Se establece como macho para que se seleccione el radiobutton
            } else {  //Si es hembra y tiene variación de genero, entra por aquí
                if (isset($_POST['shiny'])) {
                    $sprite1 = $resultadoFinal['sprites']['front_shiny_female'];
                    $sprite2 = $resultadoFinal['sprites']['back_shiny_female'];
                    $_SESSION['DAW215LLBusquedaPokemonShiny'] = true;
                } else {
                    $sprite1 = $resultadoFinal['sprites']['front_female'];
                    $sprite2 = $resultadoFinal['sprites']['back_female'];
                    $_SESSION['DAW215LLBusquedaPokemonShiny'] = false;
                }
                $_SESSION['DAW215LLBusquedaPokemonGenero'] = "hembra";
            }

            $oPokemon = new Pokemon($resultadoFinal["name"], $resultadoFinal["id"], $sprite1, $sprite2);

            return $oPokemon;
        }
    }
    
    public static function twitterApiREST($nombre){
        $curl = curl_init();
        $url = "https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=" . $nombre . "&count=2";

        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "user:password");

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }
    
    public static function propioApiREST($codDepartamento){
        $curl = curl_init(); //Iniciamos el curl
        $url = "http://daw215.sauces.local/proyectoDWES/loginLogoutPOO/api/apiREST.php?codigo=" . $codDepartamento;  //Preparamos la url de la api con el departamento que buscamos

        curl_setopt($curl, CURLOPT_URL, $url); //Le decimos que queremos los datos de esa url
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); //le decimos que lo guarde en "curl_exec" en vez de mostrarlo

        $result = curl_exec($curl); //cogemos el resultado de curl_exec para devolverlo
        $resultadoFinal = json_decode($result,true);
        curl_close($curl); //cerramos el curl

        return $resultadoFinal;   
    }
}




/*
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
 */
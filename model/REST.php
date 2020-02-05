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
        var_dump($result);
        $result = json_decode($result,true);
        var_dump($result['id']);
        curl_close($curl); //cerramos el curl

        
        $oPokemon = new Pokemon($result["name"], $result["id"], $result["sprites"]);
        
        return $oPokemon;
        
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
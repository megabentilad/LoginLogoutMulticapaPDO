<?php
/**
 * Class Pokemon
 *
 * Clase que contiene todo lo referente al pokemon (todo lo que uso)
 *
 * PHP version 7.0
 *
 * @author Luis Mateo Rivera Uriarte
 * @version Versión 1.0 Es un pokemon sin más
 * 
 */

class Pokemon{
    private $pokeNombre;
    private $pokeID;
    private $pokeSprites;
    
    /**
     * @function __construct();
     * @author Luis Mateo Rivera Uriarte
     * @version 1.0 Es un constructor, sin más.
     * @since 2020-01-26
     * @param $pokeNombre
     * @param $pokeID
     * @param $pokeSprites
     **/
    function __construct($pokeNombre, $pokeID, $pokeSprites) {
        $this->pokeNombre = $pokeNombre;
        $this->pokeID = $pokeID;
        $this->pokeSprites = $pokeSprites;
    }

    function getPokeNombre() {
        return $this->pokeNombre;
    }

    function getPokeID() {
        return $this->pokeID;
    }

    function getPokeSprites() {
        return $this->pokeSprites;
    }


}
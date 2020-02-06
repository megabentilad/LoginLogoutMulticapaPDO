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
    private $pokeSprite1;
    private $pokeSprite2;
    
    /**
     * @function __construct();
     * @author Luis Mateo Rivera Uriarte
     * @version 1.0 Es un constructor, sin más.
     * @since 2020-01-26
     * @param $pokeNombre
     * @param $pokeID
     * @param $pokeSprite1
     * @param $pokeSprite2
     **/
    function __construct($pokeNombre, $pokeID, $pokeSprite1, $pokeSprite2) {
        $this->pokeNombre = $pokeNombre;
        $this->pokeID = $pokeID;
        $this->pokeSprite1 = $pokeSprite1;
        $this->pokeSprite2 = $pokeSprite2;
    }

    function getPokeNombre() {
        return $this->pokeNombre;
    }

    function getPokeID() {
        return $this->pokeID;
    }

    function getPokeSprite1() {
        return $this->pokeSprite1;
    }
    function getPokeSprite2() {
        return $this->pokeSprite2;
    }


}
<?php
/**
 * Useless function
 * 
 * Soy un fichero, jopé
 */
/**
 * Class Pokemon
 *
 * Clase que contiene todo lo referente al pokemon (todo lo que uso)
 * @author Luis Mateo Rivera Uriarte
 * @version Versión 1.0 Es un pokemon sin más
 * @package POO-LMR
 * @property string $pokeNombre Nombre del pokemon.
 * @property string $pokeID ID del pokemon.
 * @property string $pokeSprite1 Enlace a la imagen del sprite frontal.
 * @property string $pokeSprite2 Enlace a la imagen del sprite trasera.
 */
class Pokemon{
    /**
     *
     * @var string $pokeNombre Nombre del pokemon.
     */
    private $pokeNombre;
    /**
     *
     * @var string $pokeID IDe del pokemon.
     */
    private $pokeID;
    /**
     *
     * @var string $pokeSprite1 Frontal del pokemon.
     */
    private $pokeSprite1;
    /**
     *
     * @var string $pokeSprite1 Trasero del pokemon.
     */
    private $pokeSprite2;
    
    /**
     * Constructor.
     * 
     * Pues eso, un constructor.
     * @function __construct();
     * @author Luis Mateo Rivera Uriarte
     * @version 1.0 Es un constructor, sin más.
     * @since 2020-01-26
     * @param string $pokeNombre Nombre del pokemon.
     * @param string $pokeID ID del pokemon.
     * @param string $pokeSprite1 Enlace a la imagen del sprite frontal.
     * @param string $pokeSprite2 Enlace a la imagen del sprite trasera.
     **/
    function __construct($pokeNombre, $pokeID, $pokeSprite1, $pokeSprite2) {
        $this->pokeNombre = $pokeNombre;
        $this->pokeID = $pokeID;
        $this->pokeSprite1 = $pokeSprite1;
        $this->pokeSprite2 = $pokeSprite2;
    }
    
    /**
     * Get de un valor.
     * 
     * Pues eso, no hay más, es el get de un valor.
     * @function getPokeNombre();
     * @author Luis Mateo Rivera Uriarte
     * @return string Devuelve el nombre del pokemon.
     **/
    function getPokeNombre() {
        return $this->pokeNombre;
    }
    
    /**
     * Get de un valor.
     * 
     * Pues eso, no hay más, es el get de un valor.
     * @function getPokeID();
     * @author Luis Mateo Rivera Uriarte
     * @return string Devuelve el ID del pokemon.
     **/
    function getPokeID() {
        return $this->pokeID;
    }
    
    /**
     * Get de un valor.
     * 
     * Pues eso, no hay más, es el get de un valor.
     * @function getPokeSprite1();
     * @author Luis Mateo Rivera Uriarte
     * @return string Devuelve el enlace a la imagen frontal del pokemon.
     **/
    function getPokeSprite1() {
        return $this->pokeSprite1;
    }
    
    /**
     * Get de un valor.
     * 
     * Pues eso, no hay más, es el get de un valor.
     * @function getPokeSprite1();
     * @author Luis Mateo Rivera Uriarte
     * @return string Devuelve el enlace a la imagen trasera del pokemon.
     **/
    function getPokeSprite2() {
        return $this->pokeSprite2;
    }
}
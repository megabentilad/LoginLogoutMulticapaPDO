<?php
/**
 * Useless function
 * 
 * Soy un fichero, jopé
 */
/**
 * Class Departamento
 *
 * Clase que contiene todo lo referente al usuario
 * @package POO-LMR
 * @author Luis Mateo Rivera Uriarte
 * @version Versión 1.0 Es un departamento sin más
 */
class Departamento{
    /**
     *
     * @var string $codDepartamento Descripción que me da pereza escribir.
     */
    private $codDepartamento;
    /**
     *
     * @var string $descDepartamento Descripción que me da pereza escribir.
     */
    private $descDepartamento;
    /**
     *
     * @var float $volumenNegocio Descripción que me da pereza escribir.
     */
    private $volumenNegocio;
    /**
     *
     * @var int $fechaCreacionDepartamento Descripción que me da pereza escribir.
     */
    private $fechaCreacionDepartamento;
    /**
     *
     * @var int $fechaBajaDepartamento Descripción que me da pereza escribir.
     */
    private $fechaBajaDepartamento;
    /**
     *
     * @var int $cp Descripción que me da pereza escribir.
     */
    private $cp;
    
    /**
     * Constructor.
     * 
     * Pues eso, un constructor.
     * @function __construct();
     * @author Luis Mateo Rivera Uriarte
     * @version 1.0 Es un constructor, sin más.
     * @since 2020-01-26
     * @param $codDepartamento
     * @param $descDepartamento
     * @param $volumenNegocio
     * @param $fechaCreacionDepartamento
     * @param $fechaBajaDepartamento
     * @param $cp
     **/
    function __construct($codDepartamento, $descDepartamento, $volumenNegocio, $fechaCreacionDepartamento, $fechaBajaDepartamento, $cp) {
        $this->codDepartamento = $codDepartamento;
        $this->descDepartamento = $descDepartamento;
        $this->volumenNegocio = $volumenNegocio;
        $this->fechaCreacionDepartamento = $fechaCreacionDepartamento;
        $this->fechaBajaDepartamento = $fechaBajaDepartamento;
        $this->cp = $cp;
    }
    /**
     * Get de un valor.
     * 
     * Pues eso, no hay más, es el get de un valor.
     * @function getCodDepartamento();
     * @author Luis Mateo Rivera Uriarte
     * @since 2020-01-26
     * @return string Devuelve el código del departamento.
     **/
    function getCodDepartamento() {
        return $this->codDepartamento;
    }
    /**
     * Get de un valor.
     * 
     * Pues eso, no hay más, es el get de un valor.
     * @function getDescDepartamento();
     * @author Luis Mateo Rivera Uriarte
     * @since 2020-01-26
     * @return string Devuelve la descripción del departamento.
     **/
    function getDescDepartamento() {
        return $this->descDepartamento;
    }
    /**
     * Get de un valor.
     * 
     * Pues eso, no hay más, es el get de un valor.
     * @function getVolumenNegocio();
     * @author Luis Mateo Rivera Uriarte
     * @since 2020-01-26
     * @return float Devuelve el volumen de negocio del departamento.
     **/
    function getVolumenNegocio() {
        return $this->volumenNegocio;
    }
    /**
     * Get de un valor.
     * 
     * Pues eso, no hay más, es el get de un valor.
     * @function getFechaCreacionDepartamento();
     * @author Luis Mateo Rivera Uriarte
     * @since 2020-01-26
     * @return int Devuelve el timestamp correspondiente a la fecha de cración del departamento.
     **/
    function getFechaCreacionDepartamento() {
        return $this->fechaCreacionDepartamento;
    }
    /**
     * Get de un valor.
     * 
     * Pues eso, no hay más, es el get de un valor.
     * @function getFechaBajaDepartamento();
     * @author Luis Mateo Rivera Uriarte
     * @since 2020-01-26
     * @return int Devuelve el timestamp correspondiente a la fecha de baja lógica del departamento.
     **/
    function getFechaBajaDepartamento() {
        return $this->fechaBajaDepartamento;
    }
    /**
     * Get de un valor.
     * 
     * Pues eso, no hay más, es el get de un valor.
     * @function getVolumenNegocio();
     * @author Luis Mateo Rivera Uriarte
     * @since 2020-01-26
     * @return int Devuelve el código postal de la provincia a la que pertenece.
     **/
    function getCp() {
        return $this->cp;
    }
    /**
     * Set para un valor.
     * 
     * No busques más, es simplemente eso.
     * @function setCodDepartamento();
     * @author Luis Mateo Rivera Uriarte
     * @since 2020-01-26
     * @param string $codDepartamento Código del departamento.
     **/
    function setCodDepartamento($codDepartamento) {
        $this->codDepartamento = $codDepartamento;
    }
    /**
     * Set para un valor.
     * 
     * No busques más, es simplemente eso.
     * @function setDescDepartamento();
     * @author Luis Mateo Rivera Uriarte
     * @since 2020-01-26
     * @param string $descDepartamento Descripción de un departamento.
     **/
    function setDescDepartamento($descDepartamento) {
        $this->descDepartamento = $descDepartamento;
    }
    /**
     * Set para un valor.
     * 
     * No busques más, es simplemente eso.
     * @function setVolumenNegocio();
     * @author Luis Mateo Rivera Uriarte
     * @since 2020-01-26
     * @param float $volumenNegocio Volumen de negocio de un departamento.
     **/
    function setVolumenNegocio($volumenNegocio) {
        $this->volumenNegocio = $volumenNegocio;
    }
    /**
     * Set para un valor.
     * 
     * No busques más, es simplemente eso.
     * @function setFechaCreacionDepartamento();
     * @author Luis Mateo Rivera Uriarte
     * @since 2020-01-26
     * @param int $fechaCreacionDepartamento Fecha de cración de un departamento.
     **/
    function setFechaCreacionDepartamento($fechaCreacionDepartamento) {
        $this->fechaCreacionDepartamento = $fechaCreacionDepartamento;
    }
    /**
     * Set para un valor.
     * 
     * No busques más, es simplemente eso.
     * @function setFechaBajaDepartamento();
     * @author Luis Mateo Rivera Uriarte
     * @since 2020-01-26
     * @param int $fechaBajaDepartamento Fecha de dada de baja de un departamento.
     **/
    function setFechaBajaDepartamento($fechaBajaDepartamento) {
        $this->fechaBajaDepartamento = $fechaBajaDepartamento;
    }
}
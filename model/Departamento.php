<?php
/**
 * Class Departamento
 *
 * Clase que contiene todo lo referente al usuario
 *
 * PHP version 7.0
 *
 * @author Luis Mateo Rivera Uriarte
 * @version Versión 1.0 Es un departamento sin más
 * 
 */

class Departamento{
    private $codDepartamento;
    private $descDepartamento;
    private $volumenNegocio;
    private $fechaCreacionDepartamento;
    private $fechaBajaDepartamento;
    
    /**
     * @function __construct();
     * @author Luis Mateo Rivera Uriarte
     * @version 1.0 Es un constructor, sin más.
     * @since 2020-01-26
     * @param $codDepartamento
     * @param $descDepartamento
     * @param $volumenNegocio
     * @param $fechaCreacionDepartamento
     * @param $fechaBajaDepartamento
     **/
    function __construct($codDepartamento, $descDepartamento, $volumenNegocio, $fechaCreacionDepartamento, $fechaBajaDepartamento) {
        $this->codDepartamento = $codDepartamento;
        $this->descDepartamento = $descDepartamento;
        $this->volumenNegocio = $volumenNegocio;
        $this->fechaCreacionDepartamento = $fechaCreacionDepartamento;
        $this->fechaBajaDepartamento = $fechaBajaDepartamento;
    }
    function getCodDepartamento() {
        return $this->codDepartamento;
    }

    function getDescDepartamento() {
        return $this->descDepartamento;
    }

    function getVolumenNegocio() {
        return $this->volumenNegocio;
    }

    function getFechaCreacionDepartamento() {
        return $this->fechaCreacionDepartamento;
    }

    function getFechaBajaDepartamento() {
        return $this->fechaBajaDepartamento;
    }

    function setCodDepartamento($codDepartamento) {
        $this->codDepartamento = $codDepartamento;
    }

    function setDescDepartamento($descDepartamento) {
        $this->descDepartamento = $descDepartamento;
    }

    function setVolumenNegocio($volumenNegocio) {
        $this->volumenNegocio = $volumenNegocio;
    }

    function setFechaCreacionDepartamento($fechaCreacionDepartamento) {
        $this->fechaCreacionDepartamento = $fechaCreacionDepartamento;
    }

    function setFechaBajaDepartamento($fechaBajaDepartamento) {
        $this->fechaBajaDepartamento = $fechaBajaDepartamento;
    }


}
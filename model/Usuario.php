<?php
/**
 * Class Usuario
 *
 * Clase que contiene todo lo referente al usuario
 *
 * PHP version 7.0
 *
 * @author Luis Mateo Rivera Uriarte
 * @version Versión 1.0 Es un usuario sin más
 * 
 */

class Usuario{
    private $codUsuario;
    private $password;
    private $descUsuario;
    private $numAccesos;
    private $fechaHoraUltimaConexion;
    private $perfil;
    
    //Copiado de David
    /**
     * @function __construct();
     * @author Luis Mateo Rivera Uriarte
     * @version 1.0 Es un constructor, sin más.
     * @since 2020-01-26
     * @param $codUsuario
     * @param $password
     * @param $descUsuario
     * @param $numAccesos
     * @param $fechaHoraUltimaConexion
     * @param $perfil
     **/
    function __construct($codUsuario, $password, $descUsuario, $numAccesos, $fechaHoraUltimaConexion, $perfil) {
        $this->codUsuario = $codUsuario;
        $this->password = $password;
        $this->descUsuario = $descUsuario;
        $this->numAccesos = $numAccesos;
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
        $this->perfil = $perfil;
    }

    function getCodUsuario() {
        return $this->codUsuario;
    }

    function getPassword() {
        return $this->password;
    }

    function getDescUsuario() {
        return $this->descUsuario;
    }

    function getNumAccesos() {
        return $this->numAccesos;
    }

    function getFechaHoraUltimaConexion() {
        return $this->fechaHoraUltimaConexion;
    }

    function getPerfil() {
        return $this->perfil;
    }

    function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setDescUsuario($descUsuario) {
        $this->descUsuario = $descUsuario;
    }

    function setNumAccesos($numAccesos) {
        $this->numAccesos = $numAccesos;
    }

    function setFechaHoraUltimaConexion($fechaHoraUltimaConexion) {
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
    }

    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

    
}
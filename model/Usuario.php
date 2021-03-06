<?php
/**
 * Useless function
 * 
 * Soy un fichero, jopé
 */
/**
 * Class Usuario
 *
 * Clase que contiene todo lo referente al usuario
 * @author Luis Mateo Rivera Uriarte
 * @version Versión 1.0 Es un usuario sin más
 * @package POO-LMR
 */
class Usuario{
    /**
     *
     * @var string $codUsuario Descripción que me da pereza escribir.
     */
    private $codUsuario;
    /**
     *
     * @var string $password Descripción que me da pereza escribir.
     */
    private $password;
    /**
     *
     * @var string $descUsuario Descripción que me da pereza escribir.
     */
    private $descUsuario;
    /**
     *
     * @var string $numAccesos Descripción que me da pereza escribir.
     */
    private $numAccesos;
    /**
     *
     * @var int $fechaUltimaConexion Descripción que me da pereza escribir.
     */
    private $fechaHoraUltimaConexion;
    /**
     *
     * @var string $perfil Descripción que me da pereza escribir.
     */
    private $perfil;
    
    //Copiado de David
    /**
     * Constructor.
     * 
     * Pues eso, un constructor.
     * @function __construct();
     * @author Luis Mateo Rivera Uriarte
     * @version 1.0 Es un constructor, sin más.
     * @since 2020-01-26
     * @param string $codUsuario Código del usuario.
     * @param string $password Contraseña resumida del usuario
     * @param string $descUsuario Descripción del usuario.
     * @param int $numAccesos Numero de veces que el usuario ha iniciado sesión.
     * @param int $fechaHoraUltimaConexion Timestamp equivalente a la fecha de baja lógica, si es que la hay.
     * @param string $perfil Perfil del usuario (usuario, administrador).
     **/
    function __construct($codUsuario, $password, $descUsuario, $numAccesos, $fechaHoraUltimaConexion, $perfil) {
        $this->codUsuario = $codUsuario;
        $this->password = $password;
        $this->descUsuario = $descUsuario;
        $this->numAccesos = $numAccesos;
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
        $this->perfil = $perfil;
    }
    /**
     * Get de un valor.
     * 
     * Pues eso, no hay más, es el get de un valor.
     * @function getCodUsuario();
     * @author Luis Mateo Rivera Uriarte
     * @return string Devuelve el código del departamento.
     **/
    function getCodUsuario() {
        return $this->codUsuario;
    }
    /**
     * Get de un valor.
     * 
     * Pues eso, no hay más, es el get de un valor.
     * @function getPassword();
     * @author Luis Mateo Rivera Uriarte
     * @return string Devuelve la contraseña del usuario.
     **/
    function getPassword() {
        return $this->password;
    }
    /**
     * Get de un valor.
     * 
     * Pues eso, no hay más, es el get de un valor.
     * @function getDescUsuario();
     * @author Luis Mateo Rivera Uriarte
     * @return string Devuelve la descripción del usuario.
     **/
    function getDescUsuario() {
        return $this->descUsuario;
    }
    /**
     * Get de un valor.
     * 
     * Pues eso, no hay más, es el get de un valor.
     * @function getNumAccesos();
     * @author Luis Mateo Rivera Uriarte
     * @return string Devuelve la contraseña del usuario.
     **/
    function getNumAccesos() {
        return $this->numAccesos;
    }
    /**
     * Get de un valor.
     * 
     * Pues eso, no hay más, es el get de un valor.
     * @function getFechaHoraUltimaConexion();
     * @author Luis Mateo Rivera Uriarte
     * @return int Devuelve el timestamp equivalente al momento de la última conexión del usuario a la aplicación.
     **/
    function getFechaHoraUltimaConexion() {
        return $this->fechaHoraUltimaConexion;
    }
    /**
     * Get de un valor.
     * 
     * Pues eso, no hay más, es el get de un valor.
     * @function getPerfil();
     * @author Luis Mateo Rivera Uriarte
     * @return string Devuelve el perfil del usuario. 
     **/
    function getPerfil() {
        return $this->perfil;
    }
    /**
     * Set para un valor.
     * 
     * No busques más, es simplemente eso.
     * @function setCodUsuario();
     * @author Luis Mateo Rivera Uriarte
     * @param string $codUsuario Código del usuario.
     **/
    function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }
    /**
     * Set para un valor.
     * 
     * No busques más, es simplemente eso.
     * @function setCodUsuario();
     * @author Luis Mateo Rivera Uriarte
     * @param string $password Contraseña del usuario.
     **/
    function setPassword($password) {
        $this->password = $password;
    }
    /**
     * Set para un valor.
     * 
     * No busques más, es simplemente eso.
     * @function setCodUsuario();
     * @author Luis Mateo Rivera Uriarte
     * @param string $descUsuario Descripción del usuario.
     **/
    function setDescUsuario($descUsuario) {
        $this->descUsuario = $descUsuario;
    }
    /**
     * Set para un valor.
     * 
     * No busques más, es simplemente eso.
     * @function setCodUsuario();
     * @author Luis Mateo Rivera Uriarte
     * @param int $numAccesos Número de accesos del usuario.
     **/
    function setNumAccesos($numAccesos) {
        $this->numAccesos = $numAccesos;
    }
    /**
     * Set para un valor.
     * 
     * No busques más, es simplemente eso.
     * @function setFechaHoraUltimaConexion();
     * @author Luis Mateo Rivera Uriarte
     * @param int $fechaHoraUltimaConexion Timestamp equivalente a una fecha.
     **/
    function setFechaHoraUltimaConexion($fechaHoraUltimaConexion) {
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
    }
    /**
     * Set para un valor.
     * 
     * No busques más, es simplemente eso.
     * @function setPerfil();
     * @author Luis Mateo Rivera Uriarte
     * @param int $perfil Perfil del usuario.
     **/
    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }
}
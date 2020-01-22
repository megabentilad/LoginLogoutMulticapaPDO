<?php
/**
 * Class UsuarioPDO
 *
 * Clase que contiene todo lo referente al usuarioPDO
 *
 * PHP version 7.0
 *
 * @category Validacion
 * @package  Validacion
 * @source ClaseValidacion.php
 * @since Versión 1.1 Se han formateado los mensajes de error y modificado validarDni()
 * @since Version 1.2 Se han acabado de formatear los mensajes de error, se han modificado validarURL() y se han añadido validarCp(), validarPassword(), validarRadioB() y validarCheckBox()
 * @copyright 21-10-2018
 * @author Versión 1.3 Adrián Cando Oviedo
 * @version Versión 1.3 Se han modificado la devolución de varias funciones: comprobarNoVacío, comprobarMintamanio, comprobarMaxTamanio, comprobarEntero, comprobarFloat, antes estas 3 devolvían un valor boolean, ahora
 * devuelven una cadena con el mensaje de error. Estas 3 anteriores funciones se emplean en otras 3 funciones que he cambiado, algo más compuestas las cuales son: comprobarAlfabético, 
 * @since version 1.4 Mejorado los métodos comprobarEntero() y comprobarFlaoat()
 * comprobarAlfanumerico y validarEmail. También he eliminado una función inservible "comprobarCódigo". Este cambio se basa en simplificar la cantidad de código ya que antes los * errores
 * @since version 1.5 mejorada la ortografía de los mensajes de error
 * se escribian cada vez que querías mostrarlos ahora ya los devuelve cada función a la que se ha llamado sin tener que escribir nada.
 * 
 */
require_once 'BDPDO.php';
require_once 'Usuario.php';

class UsuarioPDO{
    //Copiado de David
    
    public static function validarUsuario($codUsuario, $password){
        $consulta = "select * from T01_Usuario where T01_CodUsuario=? and T01_Password=?;";
        $objetoUsuario = null;
        $resultadoConsulta = BDPDO::ejecutarConsulta($consulta, [$codUsuario, $password]);
        if($resultadoConsulta->rowCount() == 1){
            $resultadoFormateado = $resultadoConsulta->fetchObject();
            $objetoUsuario = new Usuario($codUsuario, $password, $resultadoFormateado->T01_DescUsuario, $resultadoFormateado->T01_NumAccesos, $resultadoFormateado->T01_FechaHoraUltimaConexion, $resultadoFormateado->T01_Perfil);
        }
        return $objetoUsuario;
    }
    
    public static function actualizarUsuario($codUsuario){
        $consulta1 = "UPDATE T01_Usuario SET T01_FechaHoraUltimaConexion = " . time() . " WHERE T01_CodUsuario=?;";
        BDPDO::ejecutarConsulta($consulta1, [$codUsuario]);
        $consulta2 = "UPDATE T01_Usuario SET T01_NumAccesos = " . (intval($_SESSION['DAW215LoginLogoutPOOUsuario']->getNumAccesos()) + 1) . " WHERE T01_CodUsuario=?;";
        BDPDO::ejecutarConsulta($consulta2, [$codUsuario]);
        return true;
    }
    
    public static function existeUsuario($codUsuario){
        $consulta = "SELECT T01_CodUsuario FROM T01_Usuario WHERE T01_CodUsuario=?;";
        $resultadoConsulta = BDPDO::ejecutarConsulta($consulta, [$codUsuario]);
         if($resultadoConsulta->rowCount() == 1){
             return true;
         }
        return false;
    }
    
    public static function crearUsuario($codUsuario, $descUsuario, $password){
        $consulta = "INSERT INTO T01_Usuario(T01_CodUsuario, T01_DescUsuario, T01_Password) VALUES(?,?,?);";
        BDPDO::ejecutarConsulta($consulta, [$codUsuario, $descUsuario, $password]);
        return self::validarUsuario($codUsuario, $password);
    }
    
    public static function modificarUsuario($codUsuario, $nuevaDescUsuario){
        $consulta = "UPDATE T01_Usuario SET T01_DescUsuario = ? WHERE T01_CodUsuario = ?;";
        BDPDO::ejecutarConsulta($consulta, [$nuevaDescUsuario, $codUsuario]);
        
        $objetoUsuario = new Usuario($codUsuario, $_SESSION['DAW215LoginLogoutPOOUsuario']->getPassword(), $nuevaDescUsuario, $_SESSION['DAW215LoginLogoutPOOUsuario']->getNumAccesos(), $_SESSION['DAW215LoginLogoutPOOUsuario']->getFechaHoraUltimaConexion(), $_SESSION['DAW215LoginLogoutPOOUsuario']->getPerfil());

        return $objetoUsuario;
    }
}
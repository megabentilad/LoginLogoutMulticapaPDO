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

class UsuarioPDO{
    //Copiado de David
    
    public static function validarUsuario($codUsuario, $password){
        $consulta = "select * from T01_Usuario where T01_CodUsuario=? and T01_Password=?;";
        $arrayDatosUsuario = [];
        $resultadoConsulta = BDPDO::ejecutarConsulta($consulta, [$codUsuario, $password]);
        if($resultadoConsulta->rowCount() == 1){
            $resultadoFormateado = $resultadoConsulta->fetchObject();
            $arrayDatosUsuario["T01_CodUsuario"] = $resultadoFormateado->T01_CodUsuario;
            $arrayDatosUsuario["T01_Password"] = $resultadoFormateado->T01_Password;
            $arrayDatosUsuario["T01_DescUsuario"] = $resultadoFormateado->T01_DescUsuario;
            $arrayDatosUsuario["T01_NumAccesos"] = $resultadoFormateado->T01_NumAccesos;
            $arrayDatosUsuario["T01_FechaHoraUltimaConexion"] = $resultadoFormateado->T01_FechaHoraUltimaConexion;
            $arrayDatosUsuario["T01_Perfil"] = $resultadoFormateado->T01_Perfil;
        }
        return $arrayDatosUsuario;
    }

}
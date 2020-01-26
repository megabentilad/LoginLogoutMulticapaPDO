<?php
/**
 * Class UsuarioPDO
 *
 * Clase que contiene todo lo referente al usuarioPDO
 *
 * Clase que contiene todo lo referente al usuarioPDO que sirve para gestionar la base de datos desde la aplicación
 *
 * @since Versión 0.3 Se van añadiendo cosas, ya tu sabes
 * @author Luis Mateo Rivera Uriarte
 * @version 0.3
 *
 */
require_once 'BDPDO.php';
require_once 'Usuario.php';

class UsuarioPDO{
    //Copiado de David
    /**
     * @function validarUsuario();
     * @author Luis Mateo Rivera Uriarte
     * @version 1.0 Funciona y hace lo que debe hacer.
     * @since 2020-01-15
     * @param $codUsuario Contiene el código del usuario a validar.
     * @param $maxTamanio Tamaño máximo de la cádena.
     * @param $minTamanio Tamaño mínimo de la cadena.
     * @param $obligatorio Valor booleano indicado mediante 1, si es obligatorio o 0 si no lo es.
     * @return null -> Si la variable errores es null o en su defecto contiene tan sólo espacios en blanco
     *         $mensajeError -> Que contiene una cadena con los errores que han surgido concatenados.
     **/
    public static function validarUsuario($codUsuario, $password){
        $consulta = "select * from T01_Usuario where T01_CodUsuario=? and T01_Password=?;";
        $objetoUsuario = null;
        $resultadoConsulta = BDPDO::ejecutarConsulta($consulta, [$codUsuario, $password]);
        if($resultadoConsulta->rowCount() == 1){
            $resultadoFormateado = $resultadoConsulta->fetchObject();
            $objetoUsuario = new Usuario($codUsuario, $password, $resultadoFormateado->T01_DescUsuario, $resultadoFormateado->T01_NumAccesos, $resultadoFormateado->T01_FechaHoraUltimaConexion, $resultadoFormateado->T01_Perfil);
        
            //actualizar usuario
            $consulta1 = "UPDATE T01_Usuario SET T01_FechaHoraUltimaConexion = " . time() . " WHERE T01_CodUsuario=?;";
            BDPDO::ejecutarConsulta($consulta1, [$codUsuario]);
            $consulta2 = "UPDATE T01_Usuario SET T01_NumAccesos = " . (intval($resultadoFormateado->T01_NumAccesos) + 1) . " WHERE T01_CodUsuario=?;";
            BDPDO::ejecutarConsulta($consulta2, [$codUsuario]);
            
        }
        
        
        return $objetoUsuario;
    }

    public static function validaCodNoExiste($codUsuario){
        $consulta = "SELECT T01_CodUsuario FROM T01_Usuario WHERE T01_CodUsuario=?;";
        $resultadoConsulta = BDPDO::ejecutarConsulta($consulta, [$codUsuario]);
         if($resultadoConsulta->rowCount() == 1){
             return false;
         }
        return true;
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
    
    public static function borrarUsuario($codUsuario){
        $consulta = "DELETE FROM T01_Usuario WHERE T01_CodUsuario = ?;";
        BDPDO::ejecutarConsulta($consulta, [$codUsuario]);
        
        $objetoUsuario = null;

        return $objetoUsuario;
    }
}
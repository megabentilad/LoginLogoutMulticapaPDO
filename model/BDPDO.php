<?php
/**
 * Clas que conecta con la base de datos
 *
 * Clas que conecta con la base de datos recibiendo una consulta preparada (string) y los parámetros que se le asocian (array)
 * @author Luis Mateo Rivera Uriarte
 * @version 1.0
 * @package miPakage
 * @since 14/02/2020
 */

class BDPDO{
    //Copiado de David
    /**
     * Función que realiza consultas a la base de datos.
     * 
     * Función que realiza consultas a la base de datos utilizada por el resto del modelo.
     * @function ejecutarConsulta();
     * @author Luis Mateo Rivera Uriarte
     * @version 1.0 Funciona y hace lo que debe hacer.
     * @param string $consulta que contiene la sentencia SQL preparada.
     * @param array $parametros que contiene los parámetros de la consulta preparada.
     * @return PDOResultSet
     **/
    
    public static function ejecutarConsulta($consulta, $parametros){
        try{
            $miDB = new PDO(CONEXION, USUARIO, PASSWORD);
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $resultado = $miDB->prepare($consulta);
            $resultado->execute($parametros);
        } catch (Exception $ex) {
            echo $ex->getMessage();
            $resultado = null;
        }
        return $resultado;
    }

}
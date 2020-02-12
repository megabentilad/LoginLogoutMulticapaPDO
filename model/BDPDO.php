<?php
/**
 * Class BDPDO
 *
 * Clase que se utiliza para hacer consultas a la base de datos
 *
 * @author Luis Mateo Rivera Uriarte
 *
 */

class BDPDO{
    //Copiado de David
    /**
     * Función que realiza consultas a la base de datos.
     * 
     * Función que realiza consultas a la base de datos utilizada por el resto del modelo.
     * 
     * @function ejecutarConsulta();
     * @author Luis Mateo Rivera Uriarte
     * @version 1.0 Funciona y hace lo que debe hacer.
     * @param $consulta String que contiene la sentencia SQL preparada.
     * @param $parametros Array que contiene los parámetros de la consulta preparada.
     * @return Departamento
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
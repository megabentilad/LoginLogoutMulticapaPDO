<?php
/**
 * Class DepartamentoPDO
 *
 * Clase que contiene todo lo referente al departamentoPDO
 *
 * Clase que contiene todo lo referente al departamentoPDO que sirve para gestionar la base de datos desde la aplicación
 *
 * @since Versión 0.3 Se van añadiendo cosas, ya tu sabes
 * @author Luis Mateo Rivera Uriarte
 * @version 0.3
 *
 */
require_once 'BDPDO.php';
require_once 'Departamento.php';

class DepartamentoPDO{
    
    public static function buscarDepartamentosPorCodigo($busqueda){
        $arrayDepartamentos = [];
        $consulta = "select * from T02_Departamento where T02_CodDepartamento like ?;";
        $resultadoConsulta = BDPDO::ejecutarConsulta($consulta, [$busqueda]);
        if($resultadoConsulta->rowCount() != 0){
            for($i = 0; $i < $resultadoConsulta->rowCount(); $i++){
                $resultadoFormateado = $resultadoConsulta->fetchObject();
                $objetoDepartamento = new Departamento($resultadoFormateado->T02_CodDepartamento, $resultadoFormateado->T02_DescDepartamento, $resultadoFormateado->T02_VolumenNegocio, $resultadoFormateado->T02_FechaCreacionDepartamento, $resultadoFormateado->T02_FechaBajaDepartamento);
                array_push($arrayDepartamentos, $objetoDepartamento);
            }
            return $arrayDepartamentos;
        } 
        return $arrayDepartamentos;
    }
    public static function buscarDepartamentosPorDescripcion($busqueda){
        $arrayDepartamentos = [];
        $consulta = "select * from T02_Departamento where T02_DescDepartamento like ?;";
        $resultadoConsulta = BDPDO::ejecutarConsulta($consulta, [$busqueda]);
        if($resultadoConsulta->rowCount() != 0){
            for($i = 0; $i < $resultadoConsulta->rowCount(); $i++){
                $resultadoFormateado = $resultadoConsulta->fetchObject();
                $objetoDepartamento = new Departamento($resultadoFormateado->T02_CodDepartamento, $resultadoFormateado->T02_DescDepartamento, $resultadoFormateado->T02_VolumenNegocio, $resultadoFormateado->T02_FechaCreacionDepartamento, $resultadoFormateado->T02_FechaBajaDepartamento);
                array_push($arrayDepartamentos, $objetoDepartamento);
            }
            return $arrayDepartamentos;
        } 
        return $arrayDepartamentos;
    }
    
    public static function altaDepartamento($codDepartamento, $descDepartamento, $vol){
        $consulta = "INSERT INTO T02_Departamento(T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenNegocio) VALUES(?,?,". time() .",?);";
        BDPDO::ejecutarConsulta($consulta, [$codDepartamento, $descDepartamento, $vol]);
    }
    
    public static function bajaFisicaDepartamento($codDepartamento){
        
    }
    
    public static function bajaLogicaDepartamento($codDepartamento){
        $consulta = "update T02_Departamento set T02_FechaBajaDepartamento = ". time() ." where T02_CodDepartamento = ?;";
        BDPDO::ejecutarConsulta($consulta, [$codDepartamento]);
    }
    
    public static function modificaDepartamento($codDepartamento, $nuevaDescDepartamento, $nuevoVolumen){
        $consulta1 = "UPDATE T02_Departamento SET T02_DescDepartamento = ? WHERE T02_CodDepartamento = ?;";
        BDPDO::ejecutarConsulta($consulta1, [$nuevaDescDepartamento, $codDepartamento]);
        $consulta2 = "UPDATE T02_Departamento SET T02_VolumenNegocio = ? WHERE T02_CodDepartamento = ?;";
        BDPDO::ejecutarConsulta($consulta2, [$nuevoVolumen, $codDepartamento]);
        $consulta3 = "select * from T02_Departamento where T02_CodDepartamento like ?;";
        $resultadoConsulta = BDPDO::ejecutarConsulta($consulta3, [$codDepartamento]);
        $resultadoFormateado = $resultadoConsulta->fetchObject();
        $objetoDepartamento = new Departamento($resultadoFormateado->T02_CodDepartamento, $resultadoFormateado->T02_DescDepartamento, $resultadoFormateado->T02_VolumenNegocio, $_SESSION['DAW215LoginLogoutPOODepartamento']->getFechaCreacionDepartamento(), $_SESSION['DAW215LoginLogoutPOODepartamento']->getFechaBajaDepartamento());

        return $objetoDepartamento;
    }
    
    public static function rehabilitaDepartamento($codDepartamento){
        $consulta = "update T02_Departamento set T02_FechaBajaDepartamento = null where T02_CodDepartamento = ?;";
        BDPDO::ejecutarConsulta($consulta, [$codDepartamento]);
    }
    
    public static function validaCodNoExiste($codDepartamento){
        $consulta = "SELECT T02_CodDepartamento FROM T02_Departamento WHERE T02_CodDepartamento=?;";
        $resultadoConsulta = BDPDO::ejecutarConsulta($consulta, [$codDepartamento]);
         if($resultadoConsulta->rowCount() == 1){
             return false;
         }
        return true;
    }
    
}
